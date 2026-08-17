(function() {
    var ldJsonScript = document.createElement('script');
    ldJsonScript.type = 'application/ld+json';
    ldJsonScript.text = JSON.stringify({
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "グランドールシノハラ",
        "url": "https://grandeur-shinohara.net/",
        "logo": "https://grandeur-shinohara.net/wp-content/themes/grandeur-shinohara/images/logo.png",
        "image": "images/exterior.jpg",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "群馬県邑楽郡大泉町大字吉田",
            "addressLocality": "邑楽郡大泉町",
            "addressRegion": "群馬県",
            "postalCode": "3210-1",
            "addressCountry": "JP"
        },
        "telephone": "0276-20-0001",
        "description": "サクセス不動産",
        "numberOfUnits": 10,
        "petsAllowed": true,
        "floorSize": {
            "@type": "QuantitativeValue",
            "value": 40,
            "unitText": "SquareMeters"
        }
    });
    document.head.appendChild(ldJsonScript);

    // パンくずリストの構造化データ
    var breadcrumbJsonScript = document.createElement('script');
    breadcrumbJsonScript.type = 'application/ld+json';
    breadcrumbJsonScript.text = JSON.stringify({
        "@context": "https://schema.org",
        "@type": "BreadcrumbList",
        "name": "メニュー",
        "itemListElement": [
            {
                "@type": "ListItem",
                "position": 1,
                "name": "ホーム",
                "item": "https://grandeur-shinohara.net/"
            },
            {
                "@type": "ListItem",
                "position": 2,
                "name": "オーナー紹介",
                "item": "https://grandeur-shinohara.net/about/"
            },
            {
                "@type": "ListItem",
                "position": 3,
                "name": "お部屋情報一覧",
                "item": "https://grandeur-shinohara.net/property/"
            },
            {
                "@type": "ListItem",
                "position": 4,
                "name": "ロケーション",
                "item": "https://grandeur-shinohara.net/location/"
            },
            {
                "@type": "ListItem",
                "position": 4,
                "name": "プライバシーポリシー",
                "item": "https://grandeur-shinohara.net/privacypolicy/"
            }
        ]
    });
    document.head.appendChild(breadcrumbJsonScript);
})();