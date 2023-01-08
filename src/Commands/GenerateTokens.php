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
        $provider = new GenericProvider([
            'clientId'                => config('aweber.client_id'),
            'clientSecret'            => config('aweber.client_secret'),
            'redirectUri'             => config('aweber.redirect_uri'),
            'urlAuthorize'            => self::OAUTH_URL . 'authorize',
            'urlAccessToken'          => self::TOKEN_URL,
            'urlResourceOwnerDetails' => 'https://api.aweber.com/1.0/accounts',
        ]);

        $authorizationURL = $provider->getAuthorizationUrl();

        $this->info($authorizationURL);
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
