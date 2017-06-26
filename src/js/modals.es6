export default class Modals {
  constructor(config) {
    this.modal_buttons = $(config.modal_buttons_selector);
    this.modal_close_button = $(config.modal_close_button_selector);
    this.modal_shadow = $(config.modal_shadow_selector);
    this.setModals();
  }

  setModals() {
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
  }

  openModal() {
    this.modal_shadow.addClass('show');
  }
  closeShadow(event) {
    if(!$(event.target).is(this.modal_shadow)) {
      return;
    }
    this.closeModal();
  }
  closeModal() {
    this.modal_shadow.removeClass('show');
  }


  modalHandler() {
    this.openModal();
  }


}