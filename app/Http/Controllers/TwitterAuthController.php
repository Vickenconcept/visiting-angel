<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Abraham\TwitterOAuth\TwitterOAuth;

class TwitterAuthController extends Controller
{
    public function redirectToTwitter(Request $request)
    {
        $twitter = new TwitterOAuth(
            config('services.twitter.api_key'),
            config('services.twitter.api_key_secret')
        );
        $callbackUrl = config('services.twitter.callback_url') ?? route('twitter.callback');
        $requestToken = $twitter->oauth('oauth/request_token', ['oauth_callback' => $callbackUrl]);

        $request->session()->put('oauth_token', $requestToken['oauth_token']);
        $request->session()->put('oauth_token_secret', $requestToken['oauth_token_secret']);

        $url = $twitter->url('oauth/authorize', ['oauth_token' => $requestToken['oauth_token']]);
        return redirect($url);
    }

    public function handleTwitterCallback(Request $request)
    {
        \Log::info('Twitter callback route hit');
        $oauthToken = $request->session()->get('oauth_token');
        $oauthTokenSecret = $request->session()->get('oauth_token_secret');
        $oauthVerifier = $request->get('oauth_verifier');

        if (!$oauthToken || !$oauthTokenSecret || !$oauthVerifier) {
            \Log::error('Twitter callback missing tokens', compact('oauthToken', 'oauthTokenSecret', 'oauthVerifier'));
            return redirect('/')->with('error', 'Twitter connection failed: missing tokens.');
        }

        $twitter = new TwitterOAuth(
            config('services.twitter.api_key'),
            config('services.twitter.api_key_secret'),
            $oauthToken,
            $oauthTokenSecret
        );
        $accessToken = $twitter->oauth('oauth/access_token', ['oauth_verifier' => $oauthVerifier]);

        $user = Auth::user();
        \Log::info('Twitter callback user', ['user' => $user, 'accessToken' => $accessToken]);
        if (!$user) {
            \Log::error('No authenticated user during Twitter callback');
            return redirect('/login')->with('error', 'You must be logged in to connect your Twitter account.');
        }

        $user->twitter_account_connected = true;
        $user->twitter_account_id = $accessToken['user_id'] ?? null;
        $user->twitter_access_token = $accessToken['oauth_token'] ?? null;
        $user->twitter_access_token_secret = $accessToken['oauth_token_secret'] ?? null;
        $saved = $user->save();
        \Log::info('User after save', ['user' => $user, 'saved' => $saved]);
        if (!$saved) {
            \Log::error('Failed to save user after Twitter connect', ['user' => $user]);
            return redirect('/')->with('error', 'Failed to save Twitter connection.');
        }

        // Clean up session
        $request->session()->forget(['oauth_token', 'oauth_token_secret']);

        return redirect('/')->with('success', 'Twitter account connected!');
    }
}
