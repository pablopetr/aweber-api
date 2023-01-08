<?php

namespace Pablopetr\AweberApi\Commands;

use Illuminate\Console\Command;
use League\OAuth2\Client\Provider\GenericProvider;

class GenerateTokens extends Command
{
    protected $signature = 'aweber:generate-tokens';

    public const OAUTH_URL = "https://auth.aweber.com/oauth2/";

    public const TOKEN_URL = "https://auth.aweber.com/oauth2/token";

    public array $scopes = [];

    public function handle()
    {
        $this->initializeScopes();

        $provider = new GenericProvider([
            'clientId'                => config('aweber.client_id'),
            'clientSecret'            => config('aweber.client_secret'),
            'redirectUri'             => config('aweber.redirect_uri'),
            'urlAuthorize'            => self::OAUTH_URL . 'authorize',
            'urlAccessToken'          => self::TOKEN_URL,
            'scopes'                  => $this->scopes,
            'scopeSeparator'          => ' ',
            'urlResourceOwnerDetails' => 'https://api.aweber.com/1.0/accounts',
        ]);

        $authorizationURL = $provider->getAuthorizationUrl();

        $this->info("Please visit the following URL to generate your tokens: {$authorizationURL}");
        $_SESSION['oauth2state'] = $provider->getState();

        $url = $this->ask('Please enter the URL you were redirected to after authorizing the app');

        $this->info("Parsing URL...");
        $parsedURL = parse_url($url, PHP_URL_QUERY);
        parse_str($parsedURL, $parsedArray);

        $code = $parsedArray['code'];

        $token = $provider->getAccessToken('authorization_code', [
            'code' => $code
        ]);

        $accessToken = $token->getToken();
        $refreshToken = $token->getRefreshToken();

        $this->info("Access Token: {$accessToken}");
        $this->info("Refresh Token: {$refreshToken}");
    }

    private function initializeScopes(): void
    {
        $this->scopes = array(
            'account.read',
            'list.read',
            'list.write',
            'subscriber.read',
            'subscriber.write',
            'email.read',
            'email.write',
            'subscriber.read-extended',
            'landing-page.read'
        );
    }
}
