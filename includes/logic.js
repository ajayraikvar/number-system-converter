document.addEventListener('DOMContentLoaded', () => {
    const darkMode = nscSettings.darkMode === 'yes';
    const clipboardEnabled = nscSettings.enableClipboard === 'yes';

    if (darkMode) document.body.classList.add('nsc-dark');

    window.copyToClipboard = (text) => {
        if (clipboardEnabled) {
            navigator.clipboard.writeText(text).then(() => alert('Copied: ' + text));
        }
    };
});
