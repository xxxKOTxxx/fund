export default class Accordeon {
  constructor(config) {
    this.items = $(config.items_selector);
    this.setAccordeon();
  }

  setAccordeon() {
    this.items.each(
      (index, item)=> {
        $(item).on(
            'click',
            this.clickHandler.bind(this)
          );
      }
    );
  }

  clickHandler(event) {
    let target = $(event.currentTarget);
    target.toggleClass('opened closed');
  }
}