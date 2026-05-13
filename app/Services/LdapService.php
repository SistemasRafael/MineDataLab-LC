<?php

namespace App\Services;

class LdapService
{
    public function authenticate(string $user, string $password): bool
    {
        $ldapconn = ldap_connect('ldap://SA-DC-HSTR01.hstr.local:389');

        if (!$ldapconn) {
            return false;
        }

        ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0);

        $ldaprdn = 'HSTR\\' . trim($user); // ej: rafael.flores

        $bind = @ldap_bind($ldapconn, $ldaprdn, trim($password));

        ldap_close($ldapconn);

        return $bind;
    }
}