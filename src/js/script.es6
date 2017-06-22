require('../stylus/stylus');
import config from './config';

import WebFont from './webfont';
import Menu from './menu';
import Modals from './modals';
import Translate from './translate';

jQuery(document).ready(function() {
  new WebFont();
  new Menu(config.menu);
  new Modals(config.modals);
  new Translate(config.translate);
});


