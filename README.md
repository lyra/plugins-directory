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

PAGE_n_SLUG : One of payzen_eu, payzen_de (_deprecated_), payzen_lat, payzen_br, payzen_in, lyra, sogecommerce, e-paiement-securite-bici and clicandpay.
An analysis is in progress to produce one PayZen module by region so that we will reduce the list for PayZen to payzen_eu, payzen_lat and payzen_in. When this module will also manage Lyra Collect offer integration, the list will be reduced to lyra, sogecommerce, e-paiement-securite-bici and clicandpay.

CMS_n_SLUG : An identifier of the CMS as defined inside PAGE_n_SLUG.json and correspending to PayZen repository name if any.

## Page file structure

```javascript
[
  {
    title: "PrestaShop",
    slug: "prestashop",
    logo: "prestashop.png",
    category: "top", // may be STRING - possible values : top, regular, request, commercial, provider ...
  },
  {
    title: "OpenCart",
    logo: "opencart.png",
    slug: "opencart",
    category: {
      "fr-FR": "top",
      "de-DE": "top",
      default: "regular",
    }, // ... may be OBJECT - an object containing category by localized page, default
    // is used for pages not explicitly declared
  },
  {
    title: "HikaShop",
    slug: "hikashop",
    logo: "hikashop.png",
    labels: "Joomla,HikaShop", // STRING - labels to be used for filtering in addition to title
    category: "top",
  },
];
```

## CMS file structure

```javascript
  {
    "current": {
      "cms_version": "v 1.5 - 1.7", // STRING - prefixed with v
      "packages": [
        {
          "plugin_uri": "PayZen_PrestaShop_1.5-1.7_v1.8.1.zip", // STRING
          "plugin_version": "v1.8.1", // STRING - prefixed with v
          "doc_uri": {
            "fr-FR": "PayZen_PrestaShop_1.5-1.7_v1.8.1_fr.pdf", // STRING
            "en-EN": "PayZen_PrestaShop_1.5-1.7_v1.8.1_en.pdf", // STRING
          }, // may be OBJECT - documentation by languages ...
          "online_doc_uri":{
            "fr-FR": "https://lyra.com/fr/doc/collect/plugins/magento2/sitemap.html", // STRING
           },
          "type": "full", // STRING - possible values : full, multi, single and single-embedded
          "channel": "redirect", // STRING - integration mode, e.g. redirect, embedded
          "unsupported_payment_methods": [
            { "code": "sepa_direct_debit" },
            { "code": "oney_3x_4x" }
          ] // ARRAY - payment methods not available for this package/version
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
              "en-EN": "PayZen_PrestaShop_1.5-1.7_v1.8.1_en.pdf", // STRING
            },
            "type": "single"
          }
        ]
      }
    ]
  }
```

## Package metadata additions

Each package entry in `current.packages` or `archives[].packages` may include the following optional properties:

| Property                      | Type   | Behavior                                                                                                                                                                                                              |
| ----------------------------- | ------ | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `channel`                     | String | Integration mode: `embedded`, `embedded-redirect` or `redirect`. Defaults to `redirect` when omitted.                                                                                                                 |
| `title`                       | String | Literal card title, displayed directly without translation. When omitted, the title is translated using the channel. The property is named `title`, not `titre`.                                                      |
| `cardText`                    | String | Translation key prefix for the card description. For example, `module_hyva` selects `docs.module_hyva_description`. When omitted, the description is translated using the channel. Does not change the card title.    |
| `unsupported_payment_methods` | Array  | Payment methods unavailable for this package/version, with entries such as `{ "code": "sepa_direct_debit" }`. When omitted or empty, the card displays the message indicating that all payment methods are supported. |

Default title and description keys are:

| Channel             | Title key                             | Description key                             |
| ------------------- | ------------------------------------- | ------------------------------------------- |
| `embedded`          | `docs.module_embedded_title`          | `docs.module_embedded_description`          |
| `embedded-redirect` | `docs.module_embedded_redirect_title` | `docs.module_embedded_redirect_description` |
| `redirect`          | `docs.module_redirect_title`          | `docs.module_redirect_description`          |

Descriptions, including those selected by `cardText`, receive the site's `companyName` translation parameter. Translation keys must already exist in the frontend locale resources; these metadata properties do not define translations.

## Version group panels and badges

`panelType` is an optional string on a version group (`current` or an entry in `archives`), not on an individual package. It selects the information panel's translation keys:

| Configuration                             | Title key                                 | Message key                                 |
| ----------------------------------------- | ----------------------------------------- | ------------------------------------------- |
| `panelType` omitted                       | `docs.module_single_module_warning_title` | `docs.module_single_module_warning_message` |
| `panelType: "<prefix>"`                   | `docs.<prefix>_title`                     | `docs.<prefix>_message`                     |
| `panelType: "module_hyva_module_warning"` | `docs.module_hyva_module_warning_title`   | `docs.module_hyva_module_warning_message`   |

The information panel is displayed only when the group contains exactly two packages, even when `panelType` is set. The current frontend uses the suffix `_message` for this panel, not `_description` (which is used for card descriptions).

For two-package groups, cards normally display a recommended badge for `embedded` packages and a legacy badge for other channels. When `panelType` is exactly `module_hyva_module_warning`, both card badges are hidden (`tagVariant` is `false`). Other panel types keep the normal badges. Single-package groups do not display card badges.

This exception does not change the channel-based card styling or the latest-version badge in the group header.

### Example

```json
{
  "current": {
    "cms_version": "v 2.x",
    "panelType": "module_hyva_module_warning",
    "packages": [
      {
        "plugin_version": "v1.0.0",
        "type": "single-embedded",
        "channel": "embedded",
        "title": "Hyva payment module",
        "cardText": "module_hyva"
      },
      {
        "plugin_version": "v2.0.0",
        "type": "full",
        "channel": "embedded-redirect"
      }
    ]
  }
}
```

This group displays the Hyva information panel and no card badges. The first card uses its literal `title` and `docs.module_hyva_description`; the second card keeps the default title and description for `embedded-redirect`.

## Code Example file structure

```javascript
[
  {
    title: "PHP", // STRING, Section title displayed
    code: [
      {
        name: "REST API", // STRING
        version: "3.1.2", // STRING
        link: "https://github.com/LyraNetwork/krypton-php-sdk", // STRING
        zip: "", // STRING, from github or files
        display: ["fr-FR", "en-EN", "de-DE", "pt-BR", "lat", "es-ES"], // ARRAY, langs where the code is displayed
      },
    ],
  },
  {
    // Each language is an object containing his codes
    title: "Python",
    code: [
      {
        name: "Form Payment",
        version: "3.4",
        link: "https://github.com/payzen/vads-payment-python",
        zip: "https://github.com/payzen/vads-payment-python/archive/master.zip",
        labels: "payzen",
        display: ["fr-FR", "en-EN", "de-DE", "pt-BR", "lat", "in", "es-ES"],
      },
    ],
  },
];
```

## Naming conventions

Package name : [BRAND NAME]\_[COUNTRY CODE IF ANY]\_[CMS NAME]\_[CMS VERSION]\_[PLUGIN VERSION].zip

Documentation name : [BRAND NAME]\_[COUNTRY CODE IF ANY]\_[CMS NAME]\_[CMS VERSION]\_[PLUGIN VERSION]\_[LANGUAGE CODE].pdf
