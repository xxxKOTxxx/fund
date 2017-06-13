export default class Modals {
  constructor(config) {
    this.callback_button = $(config.callback_button_selector);
    this.modal_buttons = $(config.modal_buttons_selector);
    this.modal_close_button = $(config.modal_close_button_selector);
    this.modal_shadow = $(config.modal_shadow_selector);
    this.modals = $(config.modals_selector);
    this.request_target = $(config.request_target_selector);
    this.inputs = this.modals.find('input, textarea');
    this.setModals();
    this.tabindex_elements = $('[tabindex]')
      .filter(
        (index, element)=> {
          return parseInt($(element).prop('tabindex'), 10) >= 0;
        }
      );
  }

  setModals() {
    this.callback_button.on(
      'click',
      this.callbackHandler.bind(this)
    );
    this.modal_shadow.on(
      'click',
      this.closeShadow.bind(this)
    );
    this.modal_close_button.on(
      'click',
      this.closeModal.bind(this)
    );
    this.modal_buttons.each(
      (index, item)=> {
        $(item).on(
            'click',
            this.modalHandler.bind(this)
          );
      }
    );
    $(window).on(
      'closeModal',
      this.closeModal.bind(this)
    );
  }

  setTabindex(modal = false) {
    if(modal) {
      let modal_tabindex = $(`[data-modal-tabindex='${modal}'], [data-modal-tabindex='all']`);
      this.tabindex_elements.each(
        (index, element)=> {
          $(element)
            .data('tabindex', $(element).prop('tabindex'))
            .prop('tabindex', -1);
        }
      );
      modal_tabindex.each(
        (index, element)=> {
          $(element)
            .prop('tabindex', $(element).data('tabindex'));
        }
      );
    }
    else {
      let modal_tabindex = $('[data-modal-tabindex="callback"], [data-modal-tabindex="request"], [data-modal-tabindex="all"], [data-modal-tabindex="restore"]');
      modal_tabindex.each(
        (index, element)=> {
          $(element)
            .prop('tabindex','-1');
        }
      );
      this.tabindex_elements.each(
        (index, element)=> {
          $(element)
            .prop('tabindex', $(element).data('tabindex'));
        }
      );
    }
  }

  openModal(modal) {
    this.setTabindex(modal);
    this.modal_shadow.addClass(modal + ' show');
  }
  closeShadow(event) {
    if(!$(event.target).is(this.modal_shadow)) {
      return;
    }
    this.closeModal();
  }
  closeModal() {
    this.modal_shadow.removeClass('callback request show');
    this.resetForms();
    this.setTabindex();
  }

  resetForms() {
    this.inputs.each(
      (index, item)=> {
        if(!$(item).hasClass('language')) {
          $(item).val('');
        }
      }
    );
    this.modals.find('.form-block')
      .removeClass('success error sending');
  }

  callbackHandler() {
    this.openModal('callback');
  }

  modalHandler(event) {
    let button = $(event.currentTarget);
    let target = button.data('target');
    this.request_target.val(target);
    this.openModal('request');
  }


}