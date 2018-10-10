# PLUGINS DIRECTORY

PLUGINS DIRECTORY is a metadata project that manages payment plugins publishing and organization inside payment platform documentary websites.

## Directory organization

```
|_ PAGE_1_SLUG.json
|_ PAGE_1_SLUG
     |_ CMS_1_SLUG.json
     |_ CMS_2_SLUG.json
     |_ ...
|_ PAGE_2_SLUG.json
|_ PAGE_2_SLUG
     |_ CMS_1_SLUG.json
     |_ CMS_2_SLUG.json
     |_ ...
|_ ...
```

PAGE\_n\_SLUG : One of payzen\_eu, payzen\_de (_deprecated_), payzen\_lat, payzen\_br, payzen\_in, lyra, sogecommerce, e-paiement-securite-bici and clicandpay.
An analysis is in progress to produce one PayZen module by region so that we will reduce the list for PayZen to payzen\_eu, payzen\_lat and payzen\_in. When this module will also manage Lyra Collect offer integration, the list will be reduced to lyra, sogecommerce, e-paiement-securite-bici and clicandpay.

CMS\_n\_SLUG : An identifier of the CMS as defined inside PAGE\_n\_SLUG.json and correspending to PayZen repository name if any.

## Page file structure

```
  [
    {
      "title": "PrestaShop",
      "slug": "prestashop",
      "logo": "prestashop.png",
      "category": "top" // may be STRING - possible values : top, regular, request, commercial, provider ...
    },
    {
      "title": "OpenCart",
      "logo": "opencart.png",
      "slug": "opencart",
      "category": {
        "fr-FR": "top",
        "de-DE": "top",
        "default": "regular"
      } // ... may be OBJECT - an object containing category by localized page, default
        // is used for pages not explicitly declared
    },
    {
      "title": "HikaShop",
      "slug": "hikashop",
      "logo": "hikashop.png",
      "labels": "Joomla,HikaShop", // STRING - labels to be used for filtering in addition to title
      "category": "top"
    }
  ]
```

## CMS file structure

```
  {
    "current": {
      "cms_version": "v 1.5 - 1.7", // STRING - prefixed with v
      "packages": [
        {
          "plugin_uri": "PayZen_PrestaShop_1.5-1.7_v1.8.1.zip", // STRING
          "plugin_version": "v1.8.1", // STRING - prefixed with v
          "doc_uri": {
            "fr-FR": "PayZen_PrestaShop_1.5-1.7_v1.8.1_fr.pdf", // STRING
            "en-EN": "PayZen_EN_PrestaShop_1.5-1.7_v1.8.1_en.pdf", // STRING
          }, // may be OBJECT - documentation by languages ...
          "type": "full" // STRING - possible values : full, multi and single
        }
      ]
    },
    "archives": [
      {
        "cms_version": "v 1.4",
        "packages": [
          {
            "plugin_uri": "PayZen_PrestaShop_1.4.0.x_v1.4f.zip",
            "plugin_version": "v1.4f",
            "doc_uri": "PayZen_PrestaShop_1.5-1.7_v1.8.1_fr.pdf", // ... may be STRING
            "type": "single"
          },
          {
            "plugin_uri": "PayZen_PrestaShop_multi_1.4.0.x_v1.2f.zip",
            "plugin_version": "v1.2f",
            "doc_uri": "PayZen_PrestaShop_multi_1.5-1.7_v1.8.1_fr.pdf",
            "type": "multi"
          }
        ]
      },
      {
        "cms_version": "v 1.1 - 1.3",
        "deprecated": true, // true if module is no longer maintained
        "ext_dev": true, // true if not developped by us
        "packages": [
          {
            "plugin_uri": "PayZen_PrestaShop_1.2.4.0_v2.9a.zip",
            "plugin_version": "v2.9a",
            "doc_uri": {
              "fr-FR": "PayZen_PrestaShop_1.5-1.7_v1.8.1_fr.pdf", // STRING
              "en-EN": "PayZen_EN_PrestaShop_1.5-1.7_v1.8.1_en.pdf", // STRING
            },
            "type": "single"
          }
        ]
      }
    ]
  }
```
## Code Example file structure
``` javascript
[
  {
    "title": "PHP", // STRING, Section title displayed
    "code": [
      {
        "name": "REST API", // STRING
        "version": "3.1.2", // STRING
        "link": "https://github.com/LyraNetwork/krypton-php-sdk", // STRING
        "zip": "", // STRING, from github or files
        "display": ["fr-FR", "en-EN", "de-DE", "pt-BR", "lat", "es-ES"] // ARRAY, langs where the code is displayed
      }
    ]
  },
  { // Each language is an object containing his codes
    "title": "Python",
    "code": [
      {
        "name": "Form Payment",
        "version": "3.4",
        "link": "https://github.com/payzen/vads-payment-python",
        "zip": "https://github.com/payzen/vads-payment-python/archive/master.zip",
        "label": "payzen",
        "display": ["fr-FR", "en-EN", "de-DE", "pt-BR", "lat", "in", "es-ES"]
      }
    ]
  }
]
```

## Naming conventions

Package name : [BRAND NAME]\_[COUNTRY CODE IF ANY]\_[CMS NAME]\_[CMS VERSION]\_[PLUGIN VERSION].zip

Documentation name : [BRAND NAME]\_[COUNTRY CODE IF ANY]\_[CMS NAME]\_[CMS VERSION]\_[PLUGIN VERSION]\_[LANGUAGE CODE].pdf
