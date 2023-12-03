function initAlpine() {
  return {
    dark: JSON.parse(localStorage.getItem('dark')) || window.matchMedia('(prefers-color-scheme: dark)').matches,
    toggleTheme() {
      this.dark = !this.dark;
      localStorage.setItem('dark', this.dark);
    },

    isSideMenuOpen: false,
    toggleSideMenu() {
      this.isSideMenuOpen = !this.isSideMenuOpen;
    },
    closeSideMenu() {
      this.isSideMenuOpen = false;
    },
    isNotificationsMenuOpen: false,
    toggleNotificationsMenu() {
      this.isNotificationsMenuOpen = !this.isNotificationsMenuOpen;
    },
    closeNotificationsMenu() {
      this.isNotificationsMenuOpen = false;
    },
    isProfileMenuOpen: false,
    toggleProfileMenu() {
      this.isProfileMenuOpen = !this.isProfileMenuOpen;
    },
    closeProfileMenu() {
      this.isProfileMenuOpen = false;
    },
    isPagesMenuOpen: false,
    togglePagesMenu() {
      this.isPagesMenuOpen = !this.isPagesMenuOpen;
    },
    isLettersMenuOpen: false,
    toggleLettersMenu() {
      this.isLettersMenuOpen = !this.isLettersMenuOpen;
    },

    // Modal
    isModalOpen: false,
    trapCleanup: null,
    openModal() {
      this.isModalOpen = true;
      this.trapCleanup = focusTrap.createFocusTrap(document.querySelector('#modal'));
      this.trapCleanup.activate();
    },
    closeModal() {
      this.isModalOpen = false;
      this.trapCleanup.deactivate();
    },
  };
}

  

window.initAlpine = initAlpine;
