# PLUGINS DIRECTORY

## Directory organization

COMPANY > [COUNTRY_CODE] > [LISTING]

## File organization

    {
    "title": "Prestashop", // STRING
    "slug": "prestashop", // STRING - image name
    "logo": "prestashop-logotype1.png", // STRING
    "current_cms_version": "V1.5,1.6, 1.7", // STRING
    "category": "top", // STRING - possible values : top, regular, commercial
    "current": [ // Object
      {
        "plugin_uri": "PayZen_PrestaShop_1.5-1.7_v1.8.1.zip", // STRING
        "plugin_version": "v1.8.1", // STRING
        "doc_uri": "Integration_PayZen_PrestaShop_1.5-1.7_v1.8.1.pdf", // STRING
        "type": "full" // STRING
      }
    ],
    "archives": [ // Object
      {
        "cms_version": "V1.4",
        "plugins": [ // Object
          {
            "type": "single", // STRING
            "plugin_version": "v1.4f", // STRING
            "plugin_uri": "PayZen_Prestashop_1.4.0.x_v1.4f.zip", // STRING
            "doc_uri": "Integration_PayZen_Prestashop_1.4.0.x_v1.4f.pdf", // STRING
            "doc_title": "Integration_PayZen_Prestashop_1.4.0.x_v1.4f" // STRING
          }
        ]
      }
    ]
    }
    
## Convention de nommage du plugin

[nom de la marque]_[nom du module]_[COUNTRY_CODE]_[version du cms]_[version de notre module].zip
