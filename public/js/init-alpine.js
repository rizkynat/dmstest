function data() {
    return {
        isSideMenuOpen: false,
        toggleSideMenu() {
            this.isSideMenuOpen = !this.isSideMenuOpen;
        },
        closeSideMenu() {
            this.isSideMenuOpen = false;
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
        dataIsPagesMenuOpen: [],
        isPagesMenuOpen(pages) {
            this.dataIsPagesMenuOpen.push({ pages: false });
            return this.dataIsPagesMenuOpen[pages];
        },
        togglePagesMenu(pages) {
            this.dataIsPagesMenuOpen[pages] = !this.dataIsPagesMenuOpen[pages];
        },
        // Modal
        dataIsModalOpen: [],
        trapCleanup: [],
        isModalOpen(idModal) {
            this.dataIsModalOpen.push({idModal: false})
            this.trapCleanup.push({idModal: null})
            return this.dataIsModalOpen[idModal]
        },
        openModal(idModal) {
            this.dataIsModalOpen[idModal] = true;
            this.trapCleanup[idModal] = focusTrap(document.querySelector("#"+idModal));
        },
        closeModal(idModal) {
            this.dataIsModalOpen[idModal] = false;
            this.trapCleanup[idModal];
        },
    };
}
