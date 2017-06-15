# PLUGINS DIRECTORY

## Directory organization

COMPANY > [COUNTRY_CODE] > [LISTING]

## File organization

    {
    "title": "Prestashop", // STRING - the plugin name
    "slug": "prestashop", // STRING - slug (lowercase,no space, no special char...)
    "logo": "prestashop-logotype1.png", // STRING
    "current_cms_version": "V1.5,1.6, 1.7", // STRING - prefixed with V
    "category": "top", // STRING - possible values : top, regular, commercial
    "current": [ // Object
      {
        "plugin_uri": "PayZen_PrestaShop_1.5-1.7_v1.8.1.zip", // STRING
        "plugin_version": "v1.8.1", // STRING - prefixed with v
        "doc_uri": "Integration_PayZen_PrestaShop_1.5-1.7_v1.8.1.pdf", // STRING
        "type": "full" // STRING - possible values : full, multi, single
      }
    ],
    "archives": [ // Object
      {
        "cms_version": "V1.4", // STRING - prefixed with V
        "plugins": [ // Object 
          {
            "plugin_uri": "PayZen_Prestashop_1.4.0.x_v1.4f.zip", // STRING - the plugin url
            "plugin_version": "v1.4f", // STRING - prefixed with v
            "doc_uri": "Integration_PayZen_Prestashop_1.4.0.x_v1.4f.pdf", // STRING
            "type": "single", // STRING - possible values : full, multi, single
          }
        ]
      }
    ]
    }
    
## Convention de nommage du plugin

[nom de la marque]_[nom du module]_[COUNTRY_CODE]_[version du cms]_[version de notre module].zip
