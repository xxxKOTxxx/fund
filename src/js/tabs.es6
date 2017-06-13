export default class Tabs {
  constructor(config) {
    this.links = $(config.link_selector);
    this.tabs = $(config.tab_selector);
    this.setTabs();
  }

  setTabs() {
    this.links.each(
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
    for(let i = 0; i < this.links.length; i++) {
      let link = $(this.links[i]);
      let tab = $(this.tabs[i]);
      if(target.is(link)) {
        link.addClass('active');
        tab.removeClass('hide').addClass('show');
      }
      else {
        link.removeClass('active');
        tab.removeClass('show').addClass('hide');
      }
    }
  }
}