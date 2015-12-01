<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'twoshak2_wordpress408');

/** MySQL database username */
define('DB_USER', 'twoshak2_word408');

/** MySQL database password */
define('DB_PASSWORD', 'NpBpxY1hZh9M');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', ']F{!P>/dA&QYIQ_xvyB@bS[RWTy^Wf+_M$>bcnfQ!mWm|dhyO;BLyM;*$bAs;bwl_;]d|HHi[afyGcJ}@kS[D)>eJEpbrthv&V@)s|-KJPduI@l?/EwcMFy}*WeeQMl*');
define('SECURE_AUTH_KEY', 'TQkzK+i&;GSQkf)^x_T-IdVl^OYPMd%UXB;tADN[hxA/JC^_yjw=pFtPGPs?H}bfHN^*@DKpIjq&U;+s+JCcwQHuhJnmhGAc+lMeVbMkZa/n+Mt<m=OGydCkeTxip?pJ');
define('LOGGED_IN_KEY', 'k[GXmu?%V_k)ik|bHuOY|T*KSNMmCO!asR]AhyJVr?@|@@Y_TX{aME[N[}gpp$^<{$WKnmR}^kWzCovzhFe}K$Y@$Xh&oixGASv?FyvuHZ/KySef&E^DKaT<nsIHhA>*');
define('NONCE_KEY', ')|m]+u$t!ww|}FvHULRht=dOqFIa?*H!aD*hvNh!(N!s/zN=ndxGl+LJ-$_CwSnqOhNttx$DccssGo}%[f}U[qy]o-O<+K_%O[Ooz+oI|=ptATYKyPT{+CU@OZTCe^Y+');
define('AUTH_SALT', 'aR){>J)dVmg!U(i)/RmC+PS-;HYTt@}f]^]f_bFZ)ARGzReNK[Pr-kB&auXyu!JNFZ)?R/^?ChKZWrE>Zb*q@M%>sVN=@R)l%Plza+MT?nnn;mHVvY%mS[&AHhEP=d^w');
define('SECURE_AUTH_SALT', 'Q(%cyvxREnI&(dDTWrfefMCePrEhj@nSKEHinie}cEV)zdk}jnHh]AXrn!RTxeeG&n}HEJ[@*G(x?L^|e=u{<>BvY?Y@<UzrQhs{{iw]N!KHNIEoy>}+NuwNxOUVhVLD');
define('LOGGED_IN_SALT', 'kFy^lEcN%lIEL-Pwyx}AIbNSg)qPoWg>>-{kwEWDA-)YGX@Vd<FIgF?$tSollU*^sAys?DPuL]VF[Uhn{N-$pcEzaF%]*bpKmL_(YXTlHJ>Y(/ZqV)%]X;B|Y&%[=Okm');
define('NONCE_SALT', '*T@|eoECZ>/ccMS-}]Ea{Y%l$Frak*(SL(gpi$col*kp+[HZ=yoFdN}!r!;TM+K]E<i+xgKCBVg$)PwFhdYk&]Dij}Qep$fB_K%(!&<*M@qv{e-qPG*r)=@}/xL{RhG[');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_ysnb_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
