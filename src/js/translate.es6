const _ = require('lodash');

export default class Translate {
  constructor(config) {
    this.link_selector = config.link_selector;
    this.source = config.source;
    this.locales = ['ru', 'uk'];
    this.translations = [];
    this.current_language = $('html').prop('lang');
    this.setTranslate();
  }

  setTranslate() {
    const self = this;
    this.translate_text = $('[data-language]');
    this.text_length = this.translate_text.length;
    this.translate_title = $('[data-language-title]');
    this.title_length = this.translate_title.length;
    this.translate_href = $('[data-language-href]');
    this.href_length = this.translate_href.length;
    this.translate_placeholder = $('[data-language-placeholder]');
    this.placeholder_length = this.translate_href.length;
    this.translate_lang = $('[data-language-lang]');
    this.lang_length = this.translate_lang.length;
    this.translate_content = $('[data-language-content]');
    this.content_length = this.translate_content.length;
    this.translate_class = $('[data-language-class]');
    this.class_length = this.translate_class.length;
    this.translate_value = $('[data-language-value]');
    this.value_length = this.translate_value.length;
    $(document).on(
      'click',
      this.link_selector,
      this.clickHandler.bind(this)
    );
    if(history) {
      let url = window.location.href;
      let state = {
        initial: true
      };
      history.replaceState(state, document.title, url);
      $(window)
        .on(
          'popstate',
          (event)=> {
            if(event.originalEvent.state == null){
              return;
            }
            let state = history.state;
            if(state.initial) {
              self.getData(self.getAvailableLanguage(), true);
            }
            else {
              self.setLanguage(state.translation);
            }
          }
        );
    }
  }

  replaceLocation(data, popstate) {
    if(history) {
      let url = window.location.href.replace(this.getAvailableLanguage(), this.current_language);
      let title = this.getLanguageItem(data, 'site-title');
      let state = {
        initial: false,
        translation: data
      };
      if(popstate) {
        if(!state.translation) {
          state.initial = true;
          history.replaceState(state, title, url);
        }
      }
      else {
        history.pushState(state, title, url);
      }
    }
  }

  getLanguageItem(data, path) {
    if(!path) {
      return;
    }
    let path_array = path.split('-');
    return _.result(data, path_array, false);
  }

  setLanguage(data) {
    const self = this;
    if(this.text_length) {
      $.each(
        this.translate_text,
        (index, item)=> {
          let path = $(item).data('language');
          let translation = self.getLanguageItem(data, path);
          $(item).html(translation);
        }
      );
    }
    if(this.title_length) {
      $.each(
        this.translate_title,
        (index, item) => {
          let path = $(item).data('language-title');
          let translation = self.getLanguageItem(data, path);
          $(item).prop('title', translation);
        }
      );
    }
    if(this.href_length) {
      $.each(
        this.translate_href,
        (index, item) => {
          let path = $(item).data('language-href');
          let translation = self.getLanguageItem(data, path);
          $(item).prop('href', translation);
        }
      );
    }
    if(this.placeholder_length) {
      $.each(
        this.translate_placeholder,
        (index, item)=> {
          let path = $(item).data('language-placeholder');
          let translation = self.getLanguageItem(data, path);
          $(item).prop('placeholder', translation);
        }
      );
    }
    if(this.lang_length) {
      $.each(
        this.translate_lang,
        (index, item)=> {
          let path = $(item).data('language-lang');
          let translation = self.getLanguageItem(data, path);
          $(item).prop('lang', translation);
        }
      );
    }
    if(this.content_length) {
      $.each(
        this.translate_content,
        (index, item)=> {
          let path = $(item).data('language-content');
          let translation = self.getLanguageItem(data, path);
          $(item).prop('content', translation);
        }
      );
    }
    if(this.value_length) {
      $.each(
        this.translate_value,
        (index, item)=> {
          $(item).val(this.current_language);
        }
      );
    }
    if(this.class_length) {
      $.each(
        this.translate_class,
        (index, item)=> {
          $(item).removeClass(this.locales.join(' ')).addClass(this.current_language);
        }
      );
    }
  }
  setData(data, popstate) {
    let expires = new Date($.now()+31556926000).toGMTString();
    document.cookie = 'language='+this.current_language+';expires='+expires+';path=/';
    this.replaceLocation(data, popstate);
    this.setLanguage(data);
  }

  getData(language, popstate = false) {
    const self = this;
    self.current_language = language;
    if(!_.isUndefined(self.translations[language])) {
      self.setData(self.translations[language], popstate);
    }
    else {
      $.ajax({
        type: 'POST',
        url: this.source,
        data: 'type=ajax&language='+language,
        success: function(json) {
          let data = JSON.parse(json);
          self.translations[language] = data;
          self.setData(data, popstate);
        }
      });
    }
  }

  getAvailableLanguage() {
    return _.without(this.locales, this.current_language);
  }

  clickHandler(event) {
    event.preventDefault();
    event.stopPropagation();
    let target = $(event.currentTarget);
    let language = target.attr('href').replace(/[^a-z]/gmi, '');
    this.getData(language);
  }
}