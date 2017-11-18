<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

define( 'WP_DEBUG', true );

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'obcorvaunewsite');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'obcorvaunewsite');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '7e01X077AlPl');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'obcorvaunewsite.mysql.db');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'q/% :(wdqUcPEG}FL.X}IrDf~Js%/e/u{^d(1uCbJ_@U}:* <Vj!*]Fu.VgtN,QW');
define('SECURE_AUTH_KEY',  '++3Zxz.qCCslH=P[r4dj+!+fe>}5<m.~J`=]{=S7#0{)(?)ZL^bC=xyv:DPW<-Ub');
define('LOGGED_IN_KEY',    'RTbubf(x/9AH[>;g*XV()8P4_]V(WA3w#`E[K?}}A^Q%Cwng/jx|-Sh)@nQq.@Tl');
define('NONCE_KEY',        '`DZniIFx3]gAWy**O*Nx==!of%|uW,tMoxcJTQ&EHmASoI JG;kXApwRJ$mZ/;%!');
define('AUTH_SALT',        'Oys;&f&: 0Sqz!as(!YB$; I$;I9K$,b`mRl)6d8ZmEq?lWkV|@^iAZNgWOgVPi+');
define('SECURE_AUTH_SALT', '7DKk<DS?{*SN_07(!X>ec4eR;`mnA[d>>Sjm-@$[,[oc%2<(MA0xOdnF.2OH=u8B');
define('LOGGED_IN_SALT',   'ZiP,%(YKk1ErJ]]+k1P4d%w)gBd [0vlK3vDbB_A_]`b>5yO*gquj*A^a@R6:&MI');
define('NONCE_SALT',       'CT,kgr_7gEgA,?Ho%U:|MVS1L_LVcZy^6-* g)]zQ{Y!<&n%Cs[pm}?<5&5-brXU');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d'information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/*
 * TTX: Augmentation de la RAM pour Sportspress
 */
define('WP_MEMORY_LIMIT', '64M');

/*
 * TTX: Site URL for easier management of prod vs test site
 */
define('WP_HOME','https://obcorvault.fr');
define('WP_SITEURL','https://obcorvault.fr');

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
