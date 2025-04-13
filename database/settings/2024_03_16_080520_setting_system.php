<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('setting.key_scp');
        $this->migrator->add('setting.email_BackOffice', 'atendimento@cdldf.com.br');
        $this->migrator->add('setting.habilitate_two_authenticator', true);
    }
};
