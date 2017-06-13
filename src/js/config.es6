const google_maps_selector = '#map';

const google_maps_api_key = 'AIzaSyApmA115LIa4jT_3lBjrN_gFdlZuWKBh0Q';

const google_maps_options = {
  scrollwheel: false,
  zoom: 15
};

const google_maps_styles = [];
const latitude = 50.4389;
const longitude = 30.523151;

const inputmask_options = {
  selector: '.inputmask',
  options: {
    mask: '+38(099) 999 99 99',
    placeholder: '_',
    // onKeyValidation: function(key, result){
    //   console.log('key, result', key, result);
    // }
  }
};

const config = {
  inputmask: inputmask_options,
  google_maps: {
    latitude: latitude,
    longitude: longitude,
    selector: google_maps_selector,
    api_key: google_maps_api_key,
    options: google_maps_options,
    styles: google_maps_styles
  },
  menu: {
    panel_selector: '.menu-panel',
    scroll_speed: 5000
  },
  modals: {
    callback_button_selector: '.callback-button',
    modal_buttons_selector: '.modal-button',
    modal_close_button_selector: '.modal .close-button',
    modal_shadow_selector: '.modal-shadow',
    modals_selector: '.modal',
    request_target_selector: '.request-target',
  },
  tabs: {
    link_selector: '.tab .text',
    tab_selector: '.tab-block'
  },
  accordeon: {
    items_selector: '.faq-item'
  },
  translate: {
    link_selector: '.language-link',
    source: 'php/language.php'
  }
};

export default config;