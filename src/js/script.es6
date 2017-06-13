require('../stylus/stylus');
import config from './config';

import WebFont from './webfont';
import Menu from './menu';
import Send from './send';
import Modals from './modals';
import Tabs from './tabs';
import Accordeon from './accordeon';
import Translate from './translate';
import GoogleMaps from './google_maps';

jQuery(document).ready(function() {
  new WebFont();
  $('body').addClass('javascript');
  $(config.inputmask.selector)
    .inputmask(config.inputmask.options)
    .on(
      'input',
      (event)=> {
        $(event.currentTarget).removeClass('error');
      }
    );
  new Menu(config.menu);
  new Send();
  new Modals(config.modals);
  new Accordeon(config.accordeon);
  new Tabs(config.tabs);
  new Translate(config.translate);
  new GoogleMaps(config.google_maps);
});


