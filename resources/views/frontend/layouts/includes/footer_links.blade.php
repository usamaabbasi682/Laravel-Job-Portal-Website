<script data-cfasync="false" src="{{ asset('cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery.scrollUp.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/OverlayScrollbars.js') }}"></script>
<script src="{{ asset('frontend/assets/js/scrollax.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/select2.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/waypoints.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('backend/plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('backend/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/app.js') }}"></script>
<script src="https://unpkg.com/phosphor-icons"></script>
<script src="{{ asset('cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/ckeditor.min.js') }}"></script>
<script src="{{ asset('cdn.jsdelivr.net/gh/tomik23/autocomplete%401.8.3/dist/js/autocomplete.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/aos.js') }}"></script>
<script src="{{ asset('frontend/assets/js/slick.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/mapbox/mapbox-gl.js') }}"></script>
<script src="{{ asset('frontend/plugins/mapbox/mapbox-gl-geocoder.min.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=&amp;callback=initMap&amp;libraries=places,geometry" async defer></script>
<script src="{{ asset('frontend/assets/js/axios.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/cookieconsent/cookieconsent.js') }}"></script>
<form action="https://jobpilot.templatecookie.com/set-theme-color" method="get" style="visibility: hidden" id="themeSwitcherForm">
    <input type="hidden" name="_token" value="73C960WcaJ5w6HimPAiBaNnpCCQlf22m4e93izN8"> <input type="hidden" id="primaryColor" name="primaryColor" class="color-input" value="#0A65CC">
    <input type="hidden" id="secondaryColor" name="secondaryColor" class="color-input" value="#487CB8">
</form>
<script>
    new Autocomplete("leaflet_search", {
       // default selects the first item in
       // the list of results
       selectFirst: true,
 
       // The number of characters entered should start searching
       howManyCharacters: 2,
 
       // onSearch
       onSearch: ({ currentValue }) => {
           // You can also use static files
           // const api = '../static/search.json'
           const api = `https://nominatim.openstreetmap.org/search?format=geojson&limit=5&city=${encodeURI(currentValue)}`;
 
           return new Promise((resolve) => {
           fetch(api)
               .then((response) => response.json())
               .then((data) => {
                   resolve(data.features);
               })
               .catch((error) => {
                   console.error(error);
               });
           });
       },
       // nominatim GeoJSON format parse this part turns json into the list of
       // records that appears when you type.
       onResults: ({ currentValue, matches, template }) => {
           const regex = new RegExp(currentValue, "gi");
 
           // if the result returns 0 we
           // show the no results element
           return matches === 0
           ? template
           : matches
               .map((element) => {
                   return `
               <li class="loupe">
                   <p>
                   ${element.properties.display_name.replace(
                       regex,
                       (str) => `<b>${str}</b>`
                   )}
                   </p>
               </li> `;
               })
               .join("");
       },
 
       // we add an action to enter or click
       onSubmit: ({ object }) => {
           // console.log(object)
           // remove all layers from the map
           leaflet_map.eachLayer(function (layer) {
           if (!!layer.toGeoJSON) {
               leaflet_map.removeLayer(layer);
           }
           });
 
           const { display_name } = object.properties;
           const [lng, lat] = object.geometry.coordinates;
 
        //    const marker = L.marker([lat, lng], {
        //         title: display_name,
        //    });
 
        //    marker.addTo(leaflet_map).bindPopup(display_name);
 
           leaflet_map.setView([lat, lng], 8);
       },
 
       // get index and data from li element after
       // hovering over li with the mouse or using
       // arrow keys ↓ | ↑
       onSelectedItem: ({ index, element, object }) => {
        //    console.log(object.properties)
        //    console.log(object.geometry.coordinates)
            let leaf_lon = object.geometry.coordinates[0]
            let leaf_lat = object.geometry.coordinates[1]
            let full_address = object.properties.display_name
 
            $('.leaf_lon').val(leaf_lon);
            $('.leaf_lat').val(leaf_lat);
 
            let split_string = full_address.split(', ');
            let country = split_string.pop();
 
            // var form = new FormData();
            // form.append('lat', leaf_lat);
            // form.append('lng', leaf_lon);
            // form.append('country', country);
            // form.append('place', full_address);
 
            // axios.post('/set/session', form)
            // .then((res) => {
            //     // alert()
            //     // console.log(res.data);
            //     // toastr.success("Location Saved", 'Success!');
            // })
            // .catch((e) => {
            //     toastr.error("Something Wrong", 'Error!');
            // });
       },
 
       // the method presents no results element
       noResults: ({ currentValue, template }) =>
       template(`<li>No results found: "${currentValue}"</li>`),
   });
 </script>
<script>
    AOS.init({
        disable: "mobile",
        easing: 'ease-in-out-sine',
        once: true
    }); //toggle password

    function applyJobb(id, name) {
        $('#cvModal').modal('show');
        $('#apply_job_id').val(id);
        $('#apply_job_title').text(name);
    }

    if ($(".testimonail_active").length > 0) {
        var _$$slick;

        $(".testimonail_active").slick((_$$slick = {
                slidesToShow: 3,
                infinite: true,
                slidesToScroll: 2,
                dots: true,
                prevArrow: $(".slickprev2"),
                nextArrow: $(".slicknext2")
            }, _defineProperty(_$$slick, "prevArrow", '<button class="slide-arrow prev-arrow"></button>'),
            _defineProperty(_$$slick, "nextArrow", '<button class="slide-arrow next-arrow"></button>'),
            _defineProperty(_$$slick, "responsive", [{
                breakpoint: 1199,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            }, {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            }, {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }, {
                breakpoint: 479,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }, {
                breakpoint: 320,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }, {
                breakpoint: 210,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }]), _$$slick));
    }
</script>
<script>
    function initMap() {
        var token = "";
        var oldlat = 23.757853442383;
        var oldlng = 90.411270491741;
        const map = new google.maps.Map(document.getElementById("google-map"), {
            zoom: 7,
            center: {
                lat: oldlat,
                lng: oldlng
            },
        });
        // Search
        var input = document.getElementById('searchInput');
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        let country_code = 'PK';
        if (country_code) {
            var options = {
                componentRestrictions: {
                    country: country_code
                }
            };
            var autocomplete = new google.maps.places.Autocomplete(input, options);
        } else {
            var autocomplete = new google.maps.places.Autocomplete(input);
        }

        autocomplete.bindTo('bounds', map);
        var infowindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({
            map: map,
            anchorPoint: new google.maps.Point(0, -29)
        });
        autocomplete.addListener('place_changed', function() {
            infowindow.close();
            marker.setVisible(false);
            var place = autocomplete.getPlace();
            const total = place.address_components.length;
            let amount = '';
            if (total > 1) {
                amount = total - 2;
            }
            const result = place.address_components.slice(amount);
            let country = '';
            let region = '';
            for (let index = 0; index < result.length; index++) {
                const element = result[index];
                if (element.types[0] == 'country') {
                    country = element.long_name;
                }
                if (element.types[0] == 'administrative_area_level_1') {
                    const str = element.long_name;
                    const first = str.split(',').shift()
                    region = first;
                }
            }
            const text = region + ',' + country;
            $('#insertlocation').val(text);
            $('#lat').val(place.geometry.location.lat());
            $('#long').val(place.geometry.location.lng());
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);
            }
        });
    }
    window.initMap = initMap;
</script>
<script>
    $('.mapboxgl-ctrl-geocoder--icon').hide();
    $('.mapboxgl-ctrl-geocoder--input').attr("placeholder", "Location");
    var oldLocation = "";
    if (oldLocation) {
        $('.mapboxgl-ctrl-geocoder--input').val(oldLocation);
    }
</script>
<script>

    var path = "job/autocomplete.html";

    $('#index_search').keyup(function(e) {
        var keyword = $(this).val();

        if (keyword != '') {
            $.ajax({
                url: path,
                type: 'GET',
                dataType: "json",
                data: {
                    search: keyword
                },
                success: function(data) {
                    $('#autocomplete_index_job_results').fadeIn();
                    $('#autocomplete_index_job_results').html(data);
                }
            });
        } else {
            $('#autocomplete_index_job_results').fadeOut();
        }
    });
</script>
<script>
    window.addEventListener('load', function() {
                    // obtain plugin
        var cc = initCookieConsent();

        // run plugin with your configuration
        cc.run({
            current_lang: 'en',
            autoclear_cookies: true, // default: false
            page_scripts: true, // default: false
            force_consent: false, // default: false
            cookie_name: 'gdpr_cookie', // default: 'cc_cookie'
            cookie_expiration: 30, // default: 182 (days)
            autorun: true, // default: true

            onFirstAction: function(user_preferences, cookie) {
                // callback triggered only once on the first accept/reject action
            },

            onAccept: function(cookie) {
                // callback triggered on the first accept/reject action, and after each page load
            },

            onChange: function(cookie, changed_categories) {
                // callback triggered when user changes preferences after consent has already been given
            },

            gui_options: {
                consent_modal: {
                    layout: 'cloud', // box/cloud/bar
                    position: 'bottom right', // bottom/middle/top + left/right/center
                    transition: 'slide', // zoom/slide
                    swap_buttons: false // enable to invert buttons
                },
                settings_modal: {
                    layout: 'box', // box/bar
                    position: 'left', // left/right
                    transition: 'slide' // zoom/slide
                }
            },

            languages: {
                'en': {
                    consent_modal: {
                        title: 'We use cookies!',
                        description: 'Hi, this website uses essential cookies to ensure its proper operation and tracking cookies to understand how you interact with it. The latter will be set only after consent. <button type="button" data-cc="c-settings" class="cc-link">Let me choose</button>',
                        primary_btn: {
                            text: 'Allow all Cookies',
                            role: 'accept_all' // 'accept_selected' or 'accept_all'
                        },
                        secondary_btn: {
                            text: 'Reject all Cookies',
                            role: 'accept_necessary' // 'settings' or 'accept_necessary'
                        }
                    },
                    settings_modal: {
                        title: 'Cookie preferences',
                        save_settings_btn: 'Save settings',
                        accept_all_btn: 'Accept all',
                        reject_all_btn: 'Reject all',
                        close_btn_label: 'Close',
                        cookie_table_headers: [{
                                col1: 'Name'
                            },
                            {
                                col2: 'Domain'
                            },
                            {
                                col3: 'Expiration'
                            },
                            {
                                col4: 'Description'
                            }
                        ],
                        blocks: [{
                            title: 'Cookie usage 📢',
                            description: 'I use cookies to ensure the basic functionalities of the website and to enhance your online experience. You can choose for each category to opt-in/out whenever you want. For more details relative to cookies and other sensitive data, please read the full <a href="#" class="cc-link">privacy policy</a>.'
                        }, {
                            title: 'Strictly necessary cookies',
                            description: 'These cookies are essential for the proper functioning of my website. Without these cookies, the website would not work properly',
                            toggle: {
                                value: 'necessary',
                                enabled: true,
                                readonly: true // cookie categories with readonly=true are all treated as "necessary cookies"
                            }
                        }, {
                            title: 'Performance and Analytics cookies',
                            description: 'These cookies allow the website to remember the choices you have made in the past',
                            toggle: {
                                value: 'analytics', // your cookie category
                                enabled: false,
                                readonly: false
                            },
                            cookie_table: [ // list of all expected cookies
                                {
                                    col1: '^_ga', // match all cookies starting with "_ga"
                                    col2: 'google.com',
                                    col3: '2 years',
                                    col4: 'description ...',
                                    is_regex: true
                                },
                                {
                                    col1: '_gid',
                                    col2: 'google.com',
                                    col3: '1 day',
                                    col4: 'description ...',
                                }
                            ]
                        }, {
                            title: 'Advertisement and Targeting cookies',
                            description: 'These cookies collect information about how you use the website, which pages you visited and which links you clicked on. All of the data is anonymized and cannot be used to identify you',
                            toggle: {
                                value: 'targeting',
                                enabled: false,
                                readonly: false
                            }
                        }, {
                            title: 'More information',
                            description: 'For any queries in relation to our policy on cookies and your choices, please <a class="cc-link" href="#yourcontactpage">contact us</a>.',
                        }]
                    }
                }
            }
        });
    });
</script>
<style>
   :root {
       /* --primary-500: $primaryColor }} !important;
       --primary-600: adjustBrightness($primaryColor, -0.2) }} !important;
       --primary-200: adjustBrightness($primaryColor, 0.7) }} !important;
       --primary-100: adjustBrightness($primaryColor, 0.8) }} !important;
       --primary-50: adjustBrightness($primaryColor, 0.93) }} !important;
       --gray-20:  adjustBrightness($primaryColor, 0.98) }} !important; */
   }
</style>
<style>
   @keyframes rotation {
       from {
           -webkit-transform: rotate(0deg);
       }
       to {
           -webkit-transform: rotate(359deg);
       }
   }

   .loading {
       animation: rotation 5s infinite linear;
   }

   /*=== Media Query ===*/
   .theme-mode-panel-open .mode-switcher-panel-wrapper {
       transform: translateX(0) translateY(-50%);
   }

   .mode-switcher-panel-wrapper {
       transition: 0.4s;
       box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.15);
   }

   .mode-switcher-panel {
       padding: 25px 0 30px;
       background: #fff;
       border-radius: 0 2px 2px 0;
       position: relative;
   }

   .mode-switcher-panel .panel-group {
       padding: 0 30px;
       margin-bottom: 10px;
   }
   .mode-switcher-panel .panel-group:last-child {
       margin-bottom: 0;
   }

   .mode-switcher-panel .panel-group .panel-title {
       position: relative;
       margin-bottom: 12px;
       z-index: 0;
   }

   .mode-switcher-panel .panel-group .panel-title .title {
       display: inline-block;
       padding-right: 10px;
       color: #333;
       font-size: 14px;
       font-weight: 700;
       background: #fff;
       padding-bottom: 0;
       margin-bottom: 0;
       border-bottom: none;
       margin-top: 0;
   }

   .mode-switcher-panel .panel-group .panel-title .title::after {
       position: absolute;
       content: "";
       left: 0;
       top: 10px;
       height: 1px;
       width: 100%;
       background: #ebebeb;
       z-index: -1;
   }

   .mode-switcher-panel .panel-group .color-skin {
       display: flex;
       flex-wrap: wrap;
       margin: -7px -7px 0px;
       padding: 0;
   }

   .mode-switcher-panel .panel-group .color-skin .color-item {
       display: inline-block;
       position: relative;
       flex: 1 0 calc(25% - 14px);
       margin: 7px;
       border-radius: 2px;
       cursor: pointer;
   }

   .mode-switcher-panel .panel-group .color-skin .color-item::before {
       content: "";
       display: block;
       padding-bottom: 100%;
   }

   .mode-switcher-panel .panel-group .color-skin .color-item::after {
       position: absolute;
       content: "";
       left: 50%;
       top: calc(50% - 5px);
       height: 7px;
       width: 12px;
       border: 2px solid #fff;
       border-top: none;
       border-right: none;
       opacity: 0;
       visibility: hidden;
       transform: translateX(-50%) rotate(-45deg);
   }

   .mode-switcher-panel .panel-group .color-skin .color-item.active::after {
       opacity: 1;
       visibility: visible;
   }

   .mode-switcher-panel .buttons button:focus {
       box-shadow: none;
       outline: none;
   }

   .mode-switcher-panel .buttons {
       display: flex;
       align-items: center;
       gap: 10px;
   }

   .mode-switcher-panel .buttons .switcher-btn {
       position: relative;
       min-height: 48px;
       min-width: 48px;
       max-height: 48px;
       max-width: 48px;
       border: 0;
       display: flex;
       align-items: center;
       justify-content: center;
       border-radius: 4px;
       background: white;
       cursor: pointer;
   }

   .mode-switcher-panel .buttons .switcher-btn::before {
       position: absolute;
       top: 50%;
       left: 50%;
       width: 24px;
       height: 24px;
       transform: translate(-50%, -50%);
       content: "";
   }

   .mode-switcher-panel .buttons .switcher-btn.lite::before {
       background-image: url("data:image/svg+xml, %3Csvg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M12 17.625C15.1066 17.625 17.625 15.1066 17.625 12C17.625 8.8934 15.1066 6.375 12 6.375C8.8934 6.375 6.375 8.8934 6.375 12C6.375 15.1066 8.8934 17.625 12 17.625Z' stroke='%23697484' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3Cpath d='M12 3.375V1.5' stroke='%23697484' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3Cpath d='M5.89707 5.89707L4.5752 4.5752' stroke='%23697484' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3Cpath d='M3.375 12H1.5' stroke='%23697484' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3Cpath d='M5.89707 18.103L4.5752 19.4249' stroke='%23697484' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3Cpath d='M12 20.625V22.5' stroke='%23697484' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3Cpath d='M18.1035 18.103L19.4254 19.4249' stroke='%23697484' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3Cpath d='M20.625 12H22.5' stroke='%23697484' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3Cpath d='M18.1035 5.89707L19.4254 4.5752' stroke='%23697484' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
   }

   .mode-switcher-panel .buttons .switcher-btn.dark::before {
       background-image: url("data:image/svg+xml,%3Csvg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M20.3156 14.3062C18.8431 14.7191 17.2872 14.7326 15.8078 14.3454C14.3283 13.9582 12.9786 13.1841 11.8972 12.1027C10.8158 11.0214 10.0418 9.67162 9.65454 8.19216C9.26729 6.7127 9.28083 5.15683 9.69374 3.68433C8.24199 4.0884 6.92144 4.86578 5.86363 5.93904C4.80581 7.01231 4.04765 8.34399 3.66467 9.80144C3.28168 11.2589 3.28724 12.7913 3.68078 14.2459C4.07432 15.7006 4.84211 17.0267 5.90767 18.0923C6.97324 19.1578 8.29939 19.9256 9.75403 20.3192C11.2087 20.7127 12.741 20.7183 14.1985 20.3353C15.656 19.9523 16.9876 19.1941 18.0609 18.1363C19.1342 17.0785 19.9115 15.758 20.3156 14.3062Z' stroke='%23697484' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
   }

   .mode-switcher-panel .buttons .switcher-btn.active {
       background-color: #1777E5;
   }

   .mode-switcher-panel .buttons .switcher-btn.active.lite::before {
       background-image: url("data:image/svg+xml,%3Csvg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M12 17.625C15.1066 17.625 17.625 15.1066 17.625 12C17.625 8.8934 15.1066 6.375 12 6.375C8.8934 6.375 6.375 8.8934 6.375 12C6.375 15.1066 8.8934 17.625 12 17.625Z' stroke='white' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3Cpath d='M12 3.375V1.5' stroke='white' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3Cpath d='M5.89683 5.89683L4.57495 4.57495' stroke='white' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3Cpath d='M3.375 12H1.5' stroke='white' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3Cpath d='M5.89683 18.1031L4.57495 19.425' stroke='white' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3Cpath d='M12 20.625V22.5' stroke='white' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3Cpath d='M18.1031 18.1031L19.425 19.425' stroke='white' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3Cpath d='M20.625 12H22.5' stroke='white' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3Cpath d='M18.1031 5.89683L19.425 4.57495' stroke='white' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
   }

   .mode-switcher-panel .buttons .switcher-btn.active.dark::before {
       background-image: url("data:image/svg+xml,%3Csvg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M20.3156 14.3062C18.8431 14.7191 17.2872 14.7326 15.8078 14.3454C14.3283 13.9582 12.9786 13.1841 11.8972 12.1027C10.8158 11.0214 10.0418 9.67162 9.65454 8.19216C9.26729 6.7127 9.28083 5.15683 9.69374 3.68433C8.24199 4.0884 6.92144 4.86578 5.86363 5.93904C4.80581 7.01231 4.04765 8.34399 3.66467 9.80144C3.28168 11.2589 3.28724 12.7913 3.68078 14.2459C4.07432 15.7006 4.84211 17.0267 5.90767 18.0923C6.97324 19.1578 8.29939 19.9256 9.75403 20.3192C11.2087 20.7127 12.741 20.7183 14.1985 20.3353C15.656 19.9523 16.9876 19.1941 18.0609 18.1363C19.1342 17.0785 19.9115 15.758 20.3156 14.3062Z' stroke='white' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
   }

   .mode-switcher-panel .switcher-minimize-button {
       position: absolute;
       font-size: 24px;
       top: 30px;
       border: 0;
       left: -45px;
       display: flex;
       height: 50px;
       width: 50px;
       font-size: 20px;
       align-items: center;
       justify-content: center;
       color: #0068e1;
       color: var(--color-primary);
       background: #fff;
       border-radius: 50% 0 0 50%;
       box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.15);
       cursor: pointer;
       z-index: -1;
   }

   .mode-switcher-panel .switcher-minimize-button svg {
       font-size: inherit;
       pointer-events: none;
       transition: 0.4s;
   }

   .mode-switcher-panel .switcher-minimize-button:focus {
       outline: none;
   }

   .position-fixed-right {
       position: fixed;
       right: 0;
       transform: translateY(-50%) translateX(100%);
       top: 50%;
       z-index: 99;
   }

   .theme-change-button {
       position: fixed;
       bottom: 24px;
       right: 24px;
   }

   .theme-change-button .toggle-button {
       border: 2px solid #fff;
       -webkit-appearance: none;
       outline: none;
       width: 48px;
       height: 48px;
       border-radius: 50px;
       position: relative;
       transition: 0.4s;
       background: url("data:image/svg+xml,%3Csvg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M12 17.625C15.1066 17.625 17.625 15.1066 17.625 12C17.625 8.8934 15.1066 6.375 12 6.375C8.8934 6.375 6.375 8.8934 6.375 12C6.375 15.1066 8.8934 17.625 12 17.625Z' stroke='white' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3Cpath d='M12 3.375V1.5' stroke='white' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3Cpath d='M5.89683 5.89689L4.57495 4.57501' stroke='white' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3Cpath d='M3.375 12H1.5' stroke='white' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3Cpath d='M5.89683 18.1031L4.57495 19.425' stroke='white' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3Cpath d='M12 20.625V22.5' stroke='white' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3Cpath d='M18.1031 18.1031L19.425 19.425' stroke='white' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3Cpath d='M20.625 12H22.5' stroke='white' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3Cpath d='M18.1031 5.89689L19.425 4.57501' stroke='white' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E") no-repeat center var(--bs-primary-500);
       background-size: 24px;
       cursor: pointer;
   }

   .theme-change-button .toggle-button:checked {
       background: url("data:image/svg+xml,%3Csvg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M20.3156 14.3063C18.8431 14.7192 17.2872 14.7327 15.8078 14.3455C14.3283 13.9582 12.9786 13.1842 11.8972 12.1028C10.8158 11.0214 10.0418 9.67169 9.65454 8.19222C9.26729 6.71276 9.28083 5.15689 9.69374 3.68439C8.24199 4.08846 6.92144 4.86584 5.86363 5.93911C4.80581 7.01237 4.04765 8.34405 3.66467 9.80151C3.28168 11.259 3.28724 12.7913 3.68078 14.246C4.07432 15.7006 4.84211 17.0268 5.90767 18.0923C6.97324 19.1579 8.29939 19.9257 9.75403 20.3192C11.2087 20.7128 12.741 20.7183 14.1985 20.3353C15.656 19.9523 16.9876 19.1942 18.0609 18.1364C19.1342 17.0786 19.9115 15.758 20.3156 14.3063Z' stroke='white' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E") no-repeat center var(--bs-primary-500);
       background-size: 24px;
   }

   body[data-theme=dark] .ui-contact-area__wrapper {
       border-color: #2B384C;
       box-shadow: 0px 48px 88px rgba(0, 0, 0, 0.12);
   }

   body[data-theme=dark] .ui-btn.ui-btn-outline-primary {
       border-color: #2B384C;
   }

   body[data-theme=dark] .ui-btn.ui-btn-outline-primary:hover {
       border-color: var(--bs-tertiary-500);
   }

   body[data-theme=dark] .flc-work-process-section {
       background: rgba(43, 56, 76, 0.6);
   }

   body[data-theme=dark] .flc-work-process-section .flc-work-process-count {
       color: #2B384C !important;
   }

   body[data-theme=dark] .photographer-pricing-area {
       background: rgba(43, 56, 76, 0.6) !important;
   }

   body[data-theme=dark] .photographer-contact-area {
       background: rgba(43, 56, 76, 0.8);
   }

   body[data-theme=dark] .photographer-footer-area {
       background: #2B384C;
   }

   body[data-theme=dark] .doctor-hero-area {
       background: #05182E;
   }

   body[data-theme=dark] .doctor-event-area {
       background: rgba(43, 56, 76, 0.9) !important;
   }

   body[data-theme=dark] .law-counter-section {
       background-color: #05182E;
   }

   body[data-theme=dark] .law-blog-section {
       background: rgba(43, 56, 76, 0.9);
   }

   body[data-theme=dark] .bg-gray-50 {
       background: #05182E;
   }

   body[data-theme=dark] .dev-company-info--modifi {
       background: #05182E;
       border-top: 1px solid var(--bs-gray-100);
   }

   body[data-theme=dark] .client-testimonial {
       background: white !important;
   }

   body[data-theme=dark] .dev-contact-area__wrapper {
       border: transparent;
       box-shadow: none;
   }

   body[data-theme=dark] .dev-contact-area__wrapper .contact-content__cotacat-block {
       background: #05182E;
   }

   body[data-theme=dark] .dev-contact-area__wrapper .contact-content__info-block .icon {
       background: #05182E !important;
   }

   body[data-theme=dark] .article-case-study-area .ui-blog-card:hover {
       border-color: #2B384C;
       box-shadow: 0px 24px 64px rgba(0, 0, 0, 0.24);
   }

   body[data-theme=dark] .error-page-area__content .error_img svg .c1,
   body[data-theme=dark] .error-page-area__content .error_img svg .c2,
   body[data-theme=dark] .error-page-area__content .error_img svg .c3,
   body[data-theme=dark] .error-page-area__content .error_img svg .c3,
   body[data-theme=dark] .error-page-area__content .error_img svg .c4,
   body[data-theme=dark] .error-page-area__content .error_img svg .c5,
   body[data-theme=dark] .error-page-area__content .error_img svg .c6,
   body[data-theme=dark] .error-page-area__content .error_img svg .c7,
   body[data-theme=dark] .error-page-area__content .error_img svg .c8 {
       fill: #FFD91A;
   }

</style>
<script>
    // autocomplete
    var path = "job/autocomplete.html";

     $('.global_header_search').keyup(function(e) {
       var keyword = $(this).val();

       if (keyword != '') {
           $.ajax({
               url: path,
               type: 'GET',
               dataType: "json",
               data: {
                   search: keyword
               },
               success: function(data) {
                   $('#autocomplete_job_results').fadeIn();
                   $('#autocomplete_job_results').html(data);
               }
           });
       } else {
           $('#autocomplete_job_results').fadeOut();
       }
   });

   $('#global_search').keypress(function (e) {
       var key = e.which;

       if (key == 13) {
           $('#search-form').submit();
       }
   });

   $("#searchIcon").click(function () {
       $(".togglesearch").toggle();
       $("input[type='text']").focus();
   });

   $("#mblSearchIcon").click(function () {
       $(".mblTogglesearch").toggle();
       $("input[type='text']").focus();
   });


   $('button.effect1').on('click', function () {
       $(this).find('span').toggleClass('active');
   });

   $('.rt-mobile-menu-overlay').on('click', function () {
       $('button.effect1').find('span').removeClass('active');
   });

   //image upload scripts
   function readURL(input) {
       if (input.files && input.files[0]) {
           var reader = new FileReader();

           reader.onload = function (e) {
               if(input.className === 'profile-file-upload-input'){
                   $('.profile-image-upload-wrap').hide();
                   $('.profile-file-upload-image').attr('src', e.target.result);
                   $('.profile-file-upload-content').show();

                   // $('.image-title').html(input.files[0].name);
               }
               if(input.className === 'banner-file-upload-input'){
                   $('.banner-image-upload-wrap').hide();

                   $('.banner-file-upload-image').attr('src', e.target.result);
                   $('.banner-file-upload-content').show();

                   // $('.image-title').html(input.files[0].name);
               }
               if(input.className === 'resume-file-upload-input'){
                   $('.cv-image-upload-wrap').hide();
                   $('.resume-file-upload-content.none').show();
               }
           };

           reader.readAsDataURL(input.files[0]);

       } else {
           $('.profile-remove-image').on('click', function(){
               console.log(this.className)
               $('.profile-file-upload-input').replaceWith($('.profile-file-upload-input').clone());
               $('.profile-file-upload-content').hide();
               $('.profile-file-upload-image').attr('src', '');
               $('.profile-image-upload-wrap').show();
           })
           $('.banner-remove-image').on('click', function(){
               console.log(this.className)
               $('.banner-file-upload-input').replaceWith($('.banner-file-upload-input').clone());
               $('.banner-file-upload-content').hide();
               $('.banner-file-upload-image').attr('src', '');
               $('.banner-image-upload-wrap').show();
           })
       }
   }
   $('.profile-remove-image').on('click', function(){
       console.log(this.className)
       $('.profile-file-upload-input').replaceWith($('.profile-file-upload-input').clone());
       $('.profile-file-upload-content').hide();
       $('.profile-image-upload-wrap').show();
   })
   $('.banner-remove-image').on('click', function(){
       console.log(this.className)
       $('.banner-file-upload-input').replaceWith($('.banner-file-upload-input').clone());
       $('.banner-file-upload-content').hide();
       $('.banner-image-upload-wrap').show();
   })
   $('.cv-remove-image').on('click', function(){
       $('.resume-file-upload-input').replaceWith($('.resume-file-upload-input').clone());
       $('.resume-file-upload-content').hide();
       $('.cv-image-upload-wrap').show();
   })

   $('.image-upload-wrap').bind('dragover', function () {
       $('.image-upload-wrap').addClass('image-dropping');
   });
   $('.image-upload-wrap').bind('dragleave', function () {
       $('.image-upload-wrap').removeClass('image-dropping');
   });
</script>
<script>
   
   
   
   
   // toast config
   toastr.options = {
       "closeButton": false,
       "debug": false,
       "newestOnTop": true,
       "progressBar": true,
       "positionClass": "toast-top-right",
       "preventDuplicates": true,
       "onclick": null,
       "showDuration": "300",
       "hideDuration": "1000",
       "timeOut": "5000",
       "extendedTimeOut": "1000",
       "showEasing": "swing",
       "hideEasing": "linear",
       "hideMethod": "fadeOut"
   }

   $('.login_required').on('click', function (event) {
       event.preventDefault();

       Swal.fire({
           title: "Unauthenticated",
           text: "If you perform this action, you need to log in to your account first. Do you want to log in now",
           icon: 'warning',
           showCancelButton: true,
           confirmButtonColor: '#3085d6',
           cancelButtonColor: '#d33',
           confirmButtonText: "Yes, want to login",
           cancelButtonText: "Cancel",
       }).then((result) => {
           if (result.value) {
               window.location.href = route('login');
           }
       })
   });
   $('.no_permission').on('click', function (event) {
       event.preventDefault();
       Swal.fire({
           title: "Unauthorized Access",
           text: "You don't have permission to perform this action",
           icon: "warning",
           dangerMode: true,
       })
   });

   $('[data-toggle="tooltip"]').tooltip();

   $(".notification-icon a").off("click").on('click', function (e) {
       e.stopImmediatePropagation();
       return true;
   });

</script>
<script>
   function ReadNotification() {
       $.ajax({
           url: "http://jobpilot.templatecookie.com/user/notification/read",
           type: "POST",
           data: {
               _token: '73C960WcaJ5w6HimPAiBaNnpCCQlf22m4e93izN8'
           },
           dataType: 'json',
           success: function (data) {
               $('#unNotifications').hide();
           }
       });
   }

   function readSingleNotification(url, id) {
       $.ajax({
           url: "http://jobpilot.templatecookie.com/markasread/single/notification",
           type: "POST",
           data: {
               id: id,
               _token: '73C960WcaJ5w6HimPAiBaNnpCCQlf22m4e93izN8'
           },
           dataType: 'json',
           success: function (data) {
               window.location.href = url;
           }
       });
   }

   ClassicEditor
       .create(document.querySelector('#image_ckeditor'), {
           ckfinder: {
               uploadUrl: "http://jobpilot.templatecookie.com/ckeditor/upload?_token=73C960WcaJ5w6HimPAiBaNnpCCQlf22m4e93izN8"
           },
       })
       .catch(error => {
           console.error(error);
       });

   ClassicEditor
       .create(document.querySelector('#image_ckeditor_2'), {
           ckfinder: {
               uploadUrl: "http://jobpilot.templatecookie.com/ckeditor/upload?_token=73C960WcaJ5w6HimPAiBaNnpCCQlf22m4e93izN8"
           },
       })
       .catch(error => {
           console.error(error);
       });

   function setLocationSession(form){
       axios.post('/set/session', form)
           .then((res) => {
               // console.log(res.data);
               // toastr.success("Location Saved", 'Success!');
           })
           .catch((e) => {
               toastr.error("Something Wrong", 'Error!');
           });
   }
</script>

{{-- <script>
       var country_code = 'PK';

       mapboxgl.accessToken = "";
       const geocoder = new MapboxGeocoder({
           accessToken: mapboxgl.accessToken,
           types: 'country,region,place,postcode,locality,neighborhood',
           countries: country_code ? country_code : '',
       });
       geocoder.addTo('#geocoder');
       // Add geocoder result to container.
       geocoder.on('result', (e) => {
           var full_address = e.result.place_name;
           var words = full_address.split(",");
           var country = words.pop();
           var place = words.pop();
           const text = place + ',' + country;
           $('#insertlocation').val(text);
           $('#lat').val(e.result.center[1]);
           $('#long').val(e.result.center[0]);
       });
       // Clear results container when search is cleared.
       geocoder.on('clear', () => {
           results.innerText = '';
       });
</script> --}}

{{-- <script>
   const colorVariables = [
       {
           class: 'primary-color',
           id: 'primaryColor',
           variable: '--bs-primary-500',
           title: "Primary color",
           colors: [
               "#FF5C5C",
               "#FF944D",
               "#FFD91A",
               "#8FCC14",
               "#2DB24A",
               "#0BBAE6",
               "#1777E5",
               "#3312FF",
               "#8A43FF",
               "#E543FF",
               "#132238",
               "#697484",
           ]
       },
       {
           class: 'secondary-color',
           id: 'secondaryColor',
           variable: '--bs-secondary-500',
           title: "Secondary color",
           colors: [
               "#FF5C5C",
               "#FF944D",
               "#FFD91A",
               "#8FCC14",
               "#2DB24A",
               "#0BBAE6",
               "#1777E5",
               "#3312FF",
               "#8A43FF",
               "#E543FF",
               "#132238",
               "#697484",
           ]
       },
   ]
   const themeSwitcher = false;

   //Theme Switcher Panel
   const themePanelInit = () => {
       const dataTheme = $('body').attr('data-theme');
       const defaultActive = dataTheme ? dataTheme : 'light';

       $('body').append(`<div class="position-fixed-right mode-switcher-panel-wrapper"><div class="mode-switcher-panel">
                   ${colorVariables.map((item) => `
                       <div class="panel-group">
                           <div class="panel-title">
                               <h6 class="title">${item.title}</h6>
                           </div>
                           <ul class="color-skin">
                               ${item.colors.map((color) => `<li data-color="${color}" class="color-item ${item.class}"></li>`
                               ).join("")}
                           </ul>
                       </div>`)
                   .join("")}
                   ${ themeSwitcher ?`<div class="panel-group">
                       <div class="panel-title">
                           <h6 class="title">Change Version</h6>
                       </div>
                       <div class="buttons">
                           <button class="${defaultActive == 'light' && 'active'} switcher-btn lite" data-theme-mode="light"></button>
                           <button class="${defaultActive == 'dark' && 'active'} switcher-btn dark" data-theme-mode="dark"></button>
                       </div>
                   </div>` : ``}
                   <button class="switcher-minimize-button">
                       <!-- <svg class="loading" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#000000" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"></rect><circle cx="128" cy="128" r="48" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="12"></circle><path d="M197.4,80.7a73.6,73.6,0,0,1,6.3,10.9L229.6,106a102,102,0,0,1,.1,44l-26,14.4a73.6,73.6,0,0,1-6.3,10.9l.5,29.7a104,104,0,0,1-38.1,22.1l-25.5-15.3a88.3,88.3,0,0,1-12.6,0L96.3,227a102.6,102.6,0,0,1-38.2-22l.5-29.6a80.1,80.1,0,0,1-6.3-11L26.4,150a102,102,0,0,1-.1-44l26-14.4a73.6,73.6,0,0,1,6.3-10.9L58.1,51A104,104,0,0,1,96.2,28.9l25.5,15.3a88.3,88.3,0,0,1,12.6,0L159.7,29a102.6,102.6,0,0,1,38.2,22Z" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="12"></path></svg> -->

                       <svg class="loading" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#000000" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"></rect><path d="M229.6,106,203.7,91.6a73.6,73.6,0,0,0-6.3-10.9l.5-29.7a102.6,102.6,0,0,0-38.2-22L134.3,44.2a88.3,88.3,0,0,0-12.6,0L96.2,28.9A104,104,0,0,0,58.1,51l.5,29.7a73.6,73.6,0,0,0-6.3,10.9L26.3,106a103.6,103.6,0,0,0,.1,44l25.9,14.4a80.1,80.1,0,0,0,6.3,11L58.1,205a102.6,102.6,0,0,0,38.2,22l25.4-15.2a88.3,88.3,0,0,0,12.6,0l25.5,15.3A104,104,0,0,0,197.9,205l-.5-29.7a73.6,73.6,0,0,0,6.3-10.9l26-14.4A102,102,0,0,0,229.6,106ZM128,176a48,48,0,1,1,48-48A48,48,0,0,1,128,176Z" opacity="0.2"></path><circle cx="128" cy="128" r="48" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></circle><path d="M197.4,80.7a73.6,73.6,0,0,1,6.3,10.9L229.6,106a102,102,0,0,1,.1,44l-26,14.4a73.6,73.6,0,0,1-6.3,10.9l.5,29.7a104,104,0,0,1-38.1,22.1l-25.5-15.3a88.3,88.3,0,0,1-12.6,0L96.3,227a102.6,102.6,0,0,1-38.2-22l.5-29.6a80.1,80.1,0,0,1-6.3-11L26.4,150a103.6,103.6,0,0,1-.1-44l26-14.4a73.6,73.6,0,0,1,6.3-10.9L58.1,51A104,104,0,0,1,96.2,28.9l25.5,15.3a88.3,88.3,0,0,1,12.6,0L159.7,29a102.6,102.6,0,0,1,38.2,22Z" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></path></svg>
                   </button>
               </div>
           </div>`)

       // window load set active color active class
       colorVariables.forEach((color) => {
           let colorInput = document.querySelector(`#${color.id}`);
           let activeColorItem = document.querySelector(`.${color.class}[data-color="${colorInput.value}"]`);
           if(activeColorItem){
               activeColorItem.classList.add('active')
           }
       })
   }

   // Toggle Theme Panel on Click
   const themePanelToggle = () => {
       $('.mode-switcher-panel').on("click", function (e) {
           let button = document.querySelectorAll('.switcher-btn');
           let buttonPanel = document.querySelector('.switcher-minimize-button');
           button.forEach((btnItem) => {
               if (e.target == btnItem) {
                   e.target.classList.add('active');
                   $(e.target).siblings().removeClass('active');
                   let selectedMode = $('.switcher-btn.active').attr('data-theme-mode');
                   $('body').attr('data-theme', selectedMode);
               }
           })
           if (e.target == buttonPanel) {
               $('body').toggleClass("theme-mode-panel-open");
               if ($('body').hasClass("theme-mode-panel-open")) {
                   $(e.target).addClass("open");
               } else {
                   $(e.target).removeClass("open");
               }
           }
       })

       window.addEventListener('load', (event) => {
           const mode = localStorage.getItem('color_mode');
           if (mode) {
               $('.switcher-btn.active').removeClass('active');
               $(`.switcher-btn[data-theme-mode=${mode}]`).addClass('active');
           }
       })
   }

   // Detect click from all colors and set the specefic color on form input/body
   const changeThemeColor = () => {
       const root = document.documentElement;
       // Detect Click
       colorVariables.forEach((color) => {
           const colorSets = document.querySelectorAll(`.${color.class}`);

           // loop through all colors
           Array.from(colorSets).forEach((item) => {
               item.style.backgroundColor = item.dataset.color;

               item.addEventListener('click', (e) => {
                   // remove active class from others;
                   removeClassFromSiblings(colorSets);

                   // set active color
                   const clickedItem = e.target;
                   clickedItem.classList.add('active');
                   const clickedItemValue = clickedItem.dataset.color;

                   // set variable color
                   root.style.setProperty(color.variable, clickedItemValue);
                   // localStorage.setItem(color.variable, clickedItemValue)
                   setThemeColor(color.id, clickedItemValue)
               });
           })
       });

       // remove a specefic class from other
       function removeClassFromSiblings(colorSets) {
           Array.from(colorSets).forEach((item) => {
               item.classList.remove('active');
           })
       }
   }

   // set theme color in form input and submit the form
   const setThemeColor = (variable, color) => {
       $(`#themeSwitcherForm #${variable}`).val(color);
       $('#themeSwitcherForm').submit();
   }

   if(themeSwitcher){
     // client dark lite changer
     const toggleSwitch = document.querySelector(".toggle-button");
     const documentBody = document.body;

     toggleSwitch.addEventListener("change", function (e) {
         const mode = e.target.checked === true ? 'dark' : 'light';
         documentBody.setAttribute("data-theme", mode);
     });

     window.addEventListener('load', () => {
         const mode = localStorage.getItem('color_mode') ?? 'light';
         document.body.setAttribute("data-theme", mode);
     })

     const observer = new MutationObserver(function () {
         const mode = documentBody.getAttribute('data-theme');

         localStorage.setItem('color_mode', mode);
         toggleSwitch.checked = mode === 'dark' ? true : false;
     });

     observer.observe(documentBody, {
         attributeFilter: ['data-theme']
     });
   }

   // Initialize the color panel
   $(function () {
       themePanelInit();
       themePanelToggle();

       // on click change variable color
       changeThemeColor();
   })

</script> --}}