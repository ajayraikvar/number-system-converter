<?php
// includes/converter-ui.php

function nsc_display_converter_ui() {
    ob_start();
    ?>
    <div class="nsc-wrapper<?php echo get_option('nsc_enable_darkmode') ? ' dark-mode' : ''; ?>">
        <h2>Number System Converter</h2>
        <div class="nsc-input">
            <input type="text" id="nsc-input" placeholder="Enter number..." />
            <select id="nsc-from">
                <option value="binary">Binary</option>
                <option value="decimal" selected>Decimal</option>
                <option value="octal">Octal</option>
                <option value="hex">Hexadecimal</option>
            </select>
        </div>

        <div class="nsc-output">
            <div><strong>Binary:</strong> <span id="nsc-binary"></span></div>
            <div><strong>Decimal:</strong> <span id="nsc-decimal"></span></div>
            <div><strong>Octal:</strong> <span id="nsc-octal"></span></div>
            <div><strong>Hex:</strong> <span id="nsc-hex"></span></div>
        </div>

        <div class="nsc-options">
            <?php if (get_option('nsc_enable_clipboard')) : ?>
                <button onclick="nscCopyResults()">Copy All</button>
            <?php endif; ?>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
