let shortcuts;

fetch('public/shortcuts-config.json')
  .then(response => response.json())
  .then(response => {
    shortcuts = response;
  }).catch(error => {
    console.log(error);
  });

const handlePageEvent = (event, routeData) => {
    const hotkeys = Object.keys(routeData);

    hotkeys.includes([event.code])
        ? routeData[event.code]() //type of function - to execute when the event happens
        : {}
};

const handlePrint = () => {
    window.location.replace(window.location.href + '/print');

};

const handleKeydown = (event) => {
    const keyName = event.key;
    const print_template_html = document.querySelector('.print-template');
    const matchingRoute = '';
    // const constainsDocID = !isNaN(urlPath.substr(-1));
    // const urlPath = window.location.href;

    if (keyName === ('Meta' || 'Control' || 'Alt')) {
        return;
    }

    if (event.metaKey || event.ctrlKey) {
        const action = shortcuts.ctrlKey[event.code];

        action
            ? (event.preventDefault(), handleShortCuts(action))
            : {};
    }

    if (event.altKey) {
        const action = shortcuts.altKey[event.code];

        action
            ? handleShortCuts(action)
            : {};
    }

    // constainsDocID && event.code === 'KeyP' ? handlePrint() : handlePageEvent(event, matchingRoute);
    print_template_html !== null && event.code === 'KeyP' ? handlePrint() : handlePageEvent(event, matchingRoute);
};

const handleShortCuts = (target) => {
    let targetURL = url + target;

    window.location.replace(targetURL);
};

document.addEventListener('keydown', (event) => {
    handleKeydown(event)
}, false);
