// assets/js/converter.js

document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('nsc-input');
    const fromSelect = document.getElementById('nsc-from');
    
    input.addEventListener('input', updateConversion);

    fromSelect.addEventListener('change', updateConversion);

    function updateConversion() {
        const inputValue = input.value.trim();
        const fromType = fromSelect.value;

        let binary = '';
        let decimal = '';
        let octal = '';
        let hex = '';

        if (inputValue) {
            const decimalValue = parseInt(inputValue, fromType === 'binary' ? 2 : fromType === 'octal' ? 8 : fromType === 'hex' ? 16 : 10);
            if (!isNaN(decimalValue)) {
                binary = decimalValue.toString(2);
                decimal = decimalValue.toString(10);
                octal = decimalValue.toString(8);
                hex = decimalValue.toString(16).toUpperCase();
            }
        }

        document.getElementById('nsc-binary').innerText = binary;
        document.getElementById('nsc-decimal').innerText = decimal;
        document.getElementById('nsc-octal').innerText = octal;
        document.getElementById('nsc-hex').innerText = hex;
    }

    // Clipboard copy functionality
    window.nscCopyResults = function () {
        const results = `Binary: ${document.getElementById('nsc-binary').innerText}\nDecimal: ${document.getElementById('nsc-decimal').innerText}\nOctal: ${document.getElementById('nsc-octal').innerText}\nHexadecimal: ${document.getElementById('nsc-hex').innerText}`;
        navigator.clipboard.writeText(results).then(() => {
            alert('Results copied to clipboard!');
        });
    };
});
