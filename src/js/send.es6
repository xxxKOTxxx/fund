export default class Send {
  constructor() {
    this.forms = $('form');
    this.restore_buttons = $('.restore-form');
    this.setSend();
  }

  setSend() {
    this.forms.each(
      (index, item)=> {
        $(item).on(
            'submit',
            this.submitHandler.bind(this)
          );
      }
    );
    this.restore_buttons.on(
      'click',
      this.restoreForm.bind(this)
    );
  }

  restoreForm(event) {
    let button = $(event.target);
    let form_wrap = button.parents('.form-block');
    let form = form_wrap.find('form');
    if(button.attr('name') == 'restore') {
      if(form_wrap.parents('.modal').length) {
        let closeModal = new CustomEvent(
          'closeModal',
          {
            detail: {
              close: 'true'
            }
          }
        );
        window.dispatchEvent(closeModal);
      }
      else {
        this.resetForm(form);
        form_wrap
          .removeClass('success');
      }
    }
    else {
      form_wrap
        .removeClass('error');
      $('[data-modal-tabindex="restore"]').each(
        (index, element)=> {
          $(element).prop('tabindex', -1);
        }
      );
      form_wrap.find('[data-modal-tabindex="callback"], [data-modal-tabindex="request"]').each(
        (index, element)=> {
          $(element).prop('tabindex', $(element).data('tabindex'));
        }
      );
    }
  }


  resetForm(form) {
    let inputs = form.find('input, textarea');
    inputs.each(
      (index, item)=> {
        if(!$(item).hasClass('language')) {
          $(item).val('');
        }
      }
    );
  }

  validateForm() {
    let phone = this.form.find('.inputmask');
    let valid = phone.inputmask('isComplete') && phone.val().length;
    phone.toggleClass('error', !valid);
    if(!valid) {
      phone.focus();
    }
    return valid;
  }

  submitHandler(event) {
    let self = this;
    event.preventDefault();
    this.form = $(event.target);
    if(!this.validateForm()) {
      return;
    }
    let type = this.form.prop('method');
    let url = this.form.prop('action');
    let data = this.form.serialize();
    this.form.parent('.form-block').addClass('sending');
    $.ajax({
      type: type,
      url: url,
      data: data,
      dataType: 'json',
      success: (data)=> {
        let form_block = self.form.parents('.form-block');
        $('[data-modal-tabindex="callback"], [data-modal-tabindex="request"]').each(
          (index, element)=> {
            $(element).prop('tabindex', -1);
          }
        );
        form_block.removeClass('sending');
        if(data == 'ok') {
          form_block.addClass('success');
          form_block.find('.form-success [data-modal-tabindex="restore"]').prop('tabindex', 2);
        }
        else {
          form_block.addClass('error');
          form_block.find('.form-error [data-modal-tabindex="restore"]').prop('tabindex', 2);
        }
      },
      error: ()=> {
        self.form
          .parents('.form-block')
          .removeClass('sending')
          .addClass('error')
          .find('.form-error [data-modal-tabindex="restore"]').prop('tabindex', 2);
      }
    });
  }
}