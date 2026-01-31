<!doctype html>
<?php
  $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
  $host = $_SERVER['HTTP_HOST'];

  // Detect if the site is running in a subfolder (common on localhost)
  $reqPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?: '/';
  $projectFolder = '/fantasygem';
  $basePath = '';
  if (strpos($reqPath, $projectFolder . '/') === 0 || $reqPath === $projectFolder) {
    $basePath = $projectFolder;
  }

  $BASE_URL = $scheme . '://' . $host . $basePath;

  if (!isset($PAGE_TITLE)) $PAGE_TITLE = 'Fantasy Gems Login';
  if (!isset($PAGE_META_DESC)) $PAGE_META_DESC = 'Fantasy Gems login guide for registration, sign in, app download, bonuses, and safe play tips.';
  if (!isset($CANONICAL_PATH)) $CANONICAL_PATH = '/';
  if (!isset($ACTIVE_PAGE)) $ACTIVE_PAGE = 'home';
  if (!isset($BREADCRUMB_NAME)) $BREADCRUMB_NAME = $PAGE_TITLE;

  if (!isset($REGISTER_URL)) $REGISTER_URL = '#';
  if (!isset($LOGIN_URL)) $LOGIN_URL = '#';
  if (!isset($DOWNLOAD_URL)) $DOWNLOAD_URL = '#';

  $CANONICAL_URL = rtrim($BASE_URL, '/') . $CANONICAL_PATH;

  if (!isset($OG_TYPE)) {
    $OG_TYPE = ($CANONICAL_PATH === '/') ? 'website' : 'article';
  }
  if (!isset($OG_TITLE)) $OG_TITLE = $PAGE_TITLE;
  if (!isset($OG_DESC)) $OG_DESC = $PAGE_META_DESC;

  // Basic schema data
  $ORG_NAME = 'Fantasy Gems';
  $SITE_NAME = 'Fantasy Gems Game';
  $EMAIL = 'Info@fantasygems.pakistanforces.com';
  $OG_IMAGE = $BASE_URL . '/assets/img/Fantasy-Gems-Logo-2.webp';

  $orgId = rtrim($BASE_URL, '/') . '#organization';
  $websiteId = rtrim($BASE_URL, '/') . '#website';
  $webpageId = $CANONICAL_URL . '#webpage';

  $breadcrumbs = [
    [
      '@type' => 'ListItem',
      'position' => 1,
      'name' => 'Home',
      'item' => rtrim($BASE_URL, '/') . '/'
    ]
  ];

  if ($CANONICAL_PATH !== '/') {
    $breadcrumbs[] = [
      '@type' => 'ListItem',
      'position' => 2,
      'name' => $BREADCRUMB_NAME,
      'item' => $CANONICAL_URL
    ];
  }

  $schemaGraph = [
    [
      '@type' => 'Organization',
      '@id' => $orgId,
      'name' => $ORG_NAME,
      'url' => rtrim($BASE_URL, '/') . '/',
      'email' => $EMAIL,
      'logo' => [
        '@type' => 'ImageObject',
        'url' => $BASE_URL . '/assets/img/Fantasy-Gems-Game-Logo.webp'
      ]
    ],
    [
      '@type' => 'WebSite',
      '@id' => $websiteId,
      'url' => rtrim($BASE_URL, '/') . '/',
      'name' => $SITE_NAME,
      'inLanguage' => 'en-US',
      'publisher' => [
        '@id' => $orgId
      ]
    ],
    [
      '@type' => 'WebPage',
      '@id' => $webpageId,
      'url' => $CANONICAL_URL,
      'name' => $PAGE_TITLE,
      'description' => $PAGE_META_DESC,
      'inLanguage' => 'en-US',
      'isPartOf' => [
        '@id' => $websiteId
      ],
      'about' => [
        '@id' => $orgId
      ]
    ],
    [
      '@type' => 'BreadcrumbList',
      '@id' => $CANONICAL_URL . '#breadcrumb',
      'itemListElement' => $breadcrumbs
    ]
  ];

  $schema = [
    '@context' => 'https://schema.org',
    '@graph' => $schemaGraph
  ];
?>
<html lang="en-US">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?php echo htmlspecialchars($PAGE_TITLE); ?></title>
  <meta name="description" content="<?php echo htmlspecialchars($PAGE_META_DESC); ?>" />
  <link rel="canonical" href="<?php echo htmlspecialchars($CANONICAL_URL); ?>" />

  <meta name="robots" content="index,follow,max-snippet:-1,max-image-preview:large,max-video-preview:-1" />

  <meta property="og:site_name" content="<?php echo htmlspecialchars($SITE_NAME); ?>" />
  <meta property="og:type" content="<?php echo htmlspecialchars($OG_TYPE); ?>" />
  <meta property="og:locale" content="en-US" />
  <meta property="og:title" content="<?php echo htmlspecialchars($OG_TITLE); ?>" />
  <meta property="og:description" content="<?php echo htmlspecialchars($OG_DESC); ?>" />
  <meta property="og:url" content="<?php echo htmlspecialchars($CANONICAL_URL); ?>" />
  <meta property="og:image" content="<?php echo htmlspecialchars($OG_IMAGE); ?>" />

  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="<?php echo htmlspecialchars($OG_TITLE); ?>" />
  <meta name="twitter:description" content="<?php echo htmlspecialchars($OG_DESC); ?>" />
  <meta name="twitter:image" content="<?php echo htmlspecialchars($OG_IMAGE); ?>" />

  <link rel="icon" href="<?php echo $BASE_URL; ?>/assets/img/favicon.png" sizes="64x64" />

  <link rel="stylesheet" href="<?php echo $BASE_URL; ?>/assets/css/style.css" />
  <link rel="stylesheet" href="<?php echo $BASE_URL; ?>/assets/css/responsive.css" />

  <script type="application/ld+json"><?php echo json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?></script>
</head>
<body>
  <div class="top-strip"></div>

  <header class="site-header">
    <div class="container">
      <div class="header-inner">
        <div class="brand">
          <a class="logo" href="<?php echo $BASE_URL; ?>/"><img src="<?php echo $BASE_URL; ?>/assets/img/Fantasy-Gems-Game-Logo.webp" alt="Fantasy Gems Game Logo" loading="eager" /></a>
        </div>

        <nav class="nav" aria-label="Primary">
<a href="<?php echo $BASE_URL; ?>/about-us/"
             class="<?php echo $ACTIVE_PAGE === 'about' ? 'active' : ''; ?>">About Us</a>

          <a href="<?php echo $BASE_URL; ?>/responsible-gaming/"
             class="<?php echo $ACTIVE_PAGE === 'responsible' ? 'active' : ''; ?>">Responsible Gaming</a>

          <div class="dropdown">
            <a class="dropdown-toggle <?php echo $ACTIVE_PAGE === 'legal' ? 'active' : ''; ?>" href="<?php echo $BASE_URL; ?>/privacy-policy/">
              Legal <span aria-hidden="true">▾</span>
            </a>
            <div class="dropdown-menu" role="menu" aria-label="Legal menu">
              <a href="<?php echo $BASE_URL; ?>/privacy-policy/" role="menuitem">Privacy Policy</a>
              <a href="<?php echo $BASE_URL; ?>/terms-conditions/" role="menuitem">Terms &amp; Conditions</a>
              <a href="<?php echo $BASE_URL; ?>/disclaimer/" role="menuitem">Disclaimer</a>
            </div>
          </div>

          <a href="<?php echo $BASE_URL; ?>/contact-us/"
             class="<?php echo $ACTIVE_PAGE === 'contact' ? 'active' : ''; ?>">Contact Us</a>
        </nav>

        <div class="header-cta">
          <a class="btn btn-accent" href="<?php echo $REGISTER_URL; ?>">Register</a>
          <a class="btn btn-ghost" href="<?php echo $LOGIN_URL; ?>">Login</a>

          <button class="mobile-toggle"
                  type="button"
                  data-mobile-toggle
                  aria-label="Open menu"
                  aria-expanded="false">
            ☰
          </button>
        </div>
      </div>

      <div class="mobile-drawer" data-mobile-drawer data-open="0">
        <div class="drawer-inner">
<a href="<?php echo $BASE_URL; ?>/about-us/">About Us</a>
          <a href="<?php echo $BASE_URL; ?>/responsible-gaming/">Responsible Gaming</a>
          <a href="<?php echo $BASE_URL; ?>/privacy-policy/">Privacy Policy</a>
          <a href="<?php echo $BASE_URL; ?>/terms-conditions/">Terms &amp; Conditions</a>
          <a href="<?php echo $BASE_URL; ?>/disclaimer/">Disclaimer</a>
          <a href="<?php echo $BASE_URL; ?>/contact-us/">Contact Us</a>
          <a href="<?php echo $REGISTER_URL; ?>">Register</a>
          <a href="<?php echo $LOGIN_URL; ?>">Login</a>
        </div>
      </div>
    </div>
  </header>
