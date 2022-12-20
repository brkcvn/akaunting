export default class SessionModal {
  constructor() {
    this.session_modal = document.querySelector('[data-login-modal]');
  }

  show() {
    return this.session_modal.classList.remove('hidden');
  }

  hide() {
    return this.session_modal.classList.add('hidden');
  }
}
