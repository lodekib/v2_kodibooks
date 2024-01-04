<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kodibooks | Property Management</title>
    <link rel="stylesheet" href="../../public/css/welcome.css" />
    <style>
        @font-face {
            font-family: Untitled Sans;
            font-style: normal;
            font-weight: 400;
            src: url(https://laravel-vapor.nyc3.cdn.digitaloceanspaces.com/fonts/untitled-sans/UntitledSansWeb-Regular.woff2) format("woff2"),
                url(https://laravel-vapor.nyc3.cdn.digitaloceanspaces.com/fonts/untitled-sans/UntitledSansWeb-Regular.woff) format("woff");
        }

        @font-face {
            font-family: Untitled Sans;
            font-style: italic;
            font-weight: 400;
            src: url(https://laravel-vapor.nyc3.cdn.digitaloceanspaces.com/fonts/untitled-sans/UntitledSansWeb-RegularItalic.woff2) format("woff2"),
                url(https://laravel-vapor.nyc3.cdn.digitaloceanspaces.com/fonts/untitled-sans/UntitledSansWeb-RegularItalic.woff) format("woff");
        }

        @font-face {
            font-family: Untitled Sans;
            font-style: normal;
            font-weight: 600;
            src: url(https://laravel-vapor.nyc3.cdn.digitaloceanspaces.com/fonts/untitled-sans/UntitledSansWeb-Medium.woff2) format("woff2"),
                url(https://laravel-vapor.nyc3.cdn.digitaloceanspaces.com/fonts/untitled-sans/UntitledSansWeb-Medium.woff) format("woff");
        }

        @font-face {
            font-family: Untitled Sans;
            font-style: italic;
            font-weight: 600;
            src: url(https://laravel-vapor.nyc3.cdn.digitaloceanspaces.com/fonts/untitled-sans/UntitledSansWeb-MediumItalic.woff2) format("woff2"),
                url(https://laravel-vapor.nyc3.cdn.digitaloceanspaces.com/fonts/untitled-sans/UntitledSansWeb-MediumItalic.woff) format("woff");
        }

        @font-face {
            font-family: Untitled Sans;
            font-style: normal;
            font-weight: 700;
            src: url(https://laravel-vapor.nyc3.cdn.digitaloceanspaces.com/fonts/untitled-sans/UntitledSansWeb-Bold.woff2) format("woff2"),
                url(https://laravel-vapor.nyc3.cdn.digitaloceanspaces.com/fonts/untitled-sans/UntitledSansWeb-Bold.woff) format("woff");
        }

        @font-face {
            font-family: Untitled Sans;
            font-style: italic;
            font-weight: 700;
            src: url(https://laravel-vapor.nyc3.cdn.digitaloceanspaces.com/fonts/untitled-sans/UntitledSansWeb-BoldItalic.woff2) format("woff2"),
                url(https://laravel-vapor.nyc3.cdn.digitaloceanspaces.com/fonts/untitled-sans/UntitledSansWeb-BoldItalic.woff) format("woff");
        }

        @font-face {
            font-family: GT America;
            font-style: normal;
            font-weight: 400;
            src: url(https://laravel-vapor.nyc3.cdn.digitaloceanspaces.com/fonts/gt-america/GT-America-Standard-Regular.woff2) format("woff2"),
                url(https://laravel-vapor.nyc3.cdn.digitaloceanspaces.com/fonts/gt-america/GT-America-Standard-Regular.woff) format("woff");
        }

        @font-face {
            font-family: GT America;
            font-style: italic;
            font-weight: 400;
            src: url(https://laravel-vapor.nyc3.cdn.digitaloceanspaces.com/fonts/gt-america/GT-America-Standard-Regular-Italic.woff2) format("woff2"),
                url(https://laravel-vapor.nyc3.cdn.digitaloceanspaces.com/fonts/gt-america/GT-America-Standard-Regular-Italic.woff) format("woff");
        }

        @font-face {
            font-family: GT America;
            font-style: normal;
            font-weight: 500;
            src: url(https://laravel-vapor.nyc3.cdn.digitaloceanspaces.com/fonts/gt-america/GT-America-Standard-Medium.woff2) format("woff2"),
                url(https://laravel-vapor.nyc3.cdn.digitaloceanspaces.com/fonts/gt-america/GT-America-Standard-Medium.woff) format("woff");
        }

        @font-face {
            font-family: GT America;
            font-style: italic;
            font-weight: 500;
            src: url(https://laravel-vapor.nyc3.cdn.digitaloceanspaces.com/fonts/gt-america/GT-America-Standard-Medium-Italic.woff2) format("woff2"),
                url(https://laravel-vapor.nyc3.cdn.digitaloceanspaces.com/fonts/gt-america/GT-America-Standard-Medium-Italic.woff) format("woff");
        }

        *,
        :before,
        :after {
            box-sizing: border-box;
            border-width: 0;
            border-style: solid;
            border-color: currentColor;
        }

        :before,
        :after {
            --tw-content: "";
        }

        html {
            line-height: 1.5;
            -webkit-text-size-adjust: 100%;
            -moz-tab-size: 4;
            -o-tab-size: 4;
            tab-size: 4;
            font-family: Untitled Sans, ui-sans-serif, system-ui, -apple-system,
                BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans,
                sans-serif, "Apple Color Emoji", "Segoe UI Emoji", Segoe UI Symbol,
                "Noto Color Emoji";
            font-feature-settings: normal;
        }

        body {
            margin: 0;
            line-height: inherit;
        }

        hr {
            height: 0;
            color: inherit;
            border-top-width: 1px;
        }

        abbr:where([title]) {
            -webkit-text-decoration: underline dotted;
            text-decoration: underline dotted;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-size: inherit;
            font-weight: inherit;
        }

        a {
            color: inherit;
            text-decoration: inherit;
        }

        b,
        strong {
            font-weight: bolder;
        }

        code,
        kbd,
        samp,
        pre {
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas,
                Liberation Mono, Courier New, monospace;
            font-size: 1em;
        }

        small {
            font-size: 80%;
        }

        sub,
        sup {
            font-size: 75%;
            line-height: 0;
            position: relative;
            vertical-align: baseline;
        }

        sub {
            bottom: -0.25em;
        }

        sup {
            top: -0.5em;
        }

        table {
            text-indent: 0;
            border-color: inherit;
            border-collapse: collapse;
        }

        button,
        input,
        optgroup,
        select,
        textarea {
            font-family: inherit;
            font-size: 100%;
            font-weight: inherit;
            line-height: inherit;
            color: inherit;
            margin: 0;
            padding: 0;
        }

        button,
        select {
            text-transform: none;
        }

        button,
        [type="button"],
        [type="reset"],
        [type="submit"] {
            -webkit-appearance: button;
            background-color: transparent;
            background-image: none;
        }

        :-moz-focusring {
            outline: auto;
        }

        :-moz-ui-invalid {
            box-shadow: none;
        }

        progress {
            vertical-align: baseline;
        }

        ::-webkit-inner-spin-button,
        ::-webkit-outer-spin-button {
            height: auto;
        }

        [type="search"] {
            -webkit-appearance: textfield;
            outline-offset: -2px;
        }

        ::-webkit-search-decoration {
            -webkit-appearance: none;
        }

        ::-webkit-file-upload-button {
            -webkit-appearance: button;
            font: inherit;
        }

        summary {
            display: list-item;
        }

        blockquote,
        dl,
        dd,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        hr,
        figure,
        p,
        pre {
            margin: 0;
        }

        fieldset {
            margin: 0;
            padding: 0;
        }

        legend {
            padding: 0;
        }

        ol,
        ul,
        menu {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        textarea {
            resize: vertical;
        }

        input::-moz-placeholder,
        textarea::-moz-placeholder {
            opacity: 1;
            color: #9ca3af;
        }

        input::placeholder,
        textarea::placeholder {
            opacity: 1;
            color: #9ca3af;
        }

        button,
        [role="button"] {
            cursor: pointer;
        }

        :disabled {
            cursor: default;
        }

        img,
        svg,
        video,
        canvas,
        audio,
        iframe,
        embed,
        object {
            display: block;
            vertical-align: middle;
        }

        img,
        video {
            max-width: 100%;
            height: auto;
        }

        [hidden] {
            display: none;
        }

        *,
        :before,
        :after {
            --tw-border-spacing-x: 0;
            --tw-border-spacing-y: 0;
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            --tw-pan-x: ;
            --tw-pan-y: ;
            --tw-pinch-zoom: ;
            --tw-scroll-snap-strictness: proximity;
            --tw-ordinal: ;
            --tw-slashed-zero: ;
            --tw-numeric-figure: ;
            --tw-numeric-spacing: ;
            --tw-numeric-fraction: ;
            --tw-ring-inset: ;
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: rgb(59 130 246 / 0.5);
            --tw-ring-offset-shadow: 0 0 #0000;
            --tw-ring-shadow: 0 0 #0000;
            --tw-shadow: 0 0 #0000;
            --tw-shadow-colored: 0 0 #0000;
            --tw-blur: ;
            --tw-brightness: ;
            --tw-contrast: ;
            --tw-grayscale: ;
            --tw-hue-rotate: ;
            --tw-invert: ;
            --tw-saturate: ;
            --tw-sepia: ;
            --tw-drop-shadow: ;
            --tw-backdrop-blur: ;
            --tw-backdrop-brightness: ;
            --tw-backdrop-contrast: ;
            --tw-backdrop-grayscale: ;
            --tw-backdrop-hue-rotate: ;
            --tw-backdrop-invert: ;
            --tw-backdrop-opacity: ;
            --tw-backdrop-saturate: ;
            --tw-backdrop-sepia: ;
        }

        ::backdrop {
            --tw-border-spacing-x: 0;
            --tw-border-spacing-y: 0;
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            --tw-pan-x: ;
            --tw-pan-y: ;
            --tw-pinch-zoom: ;
            --tw-scroll-snap-strictness: proximity;
            --tw-ordinal: ;
            --tw-slashed-zero: ;
            --tw-numeric-figure: ;
            --tw-numeric-spacing: ;
            --tw-numeric-fraction: ;
            --tw-ring-inset: ;
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: rgb(59 130 246 / 0.5);
            --tw-ring-offset-shadow: 0 0 #0000;
            --tw-ring-shadow: 0 0 #0000;
            --tw-shadow: 0 0 #0000;
            --tw-shadow-colored: 0 0 #0000;
            --tw-blur: ;
            --tw-brightness: ;
            --tw-contrast: ;
            --tw-grayscale: ;
            --tw-hue-rotate: ;
            --tw-invert: ;
            --tw-saturate: ;
            --tw-sepia: ;
            --tw-drop-shadow: ;
            --tw-backdrop-blur: ;
            --tw-backdrop-brightness: ;
            --tw-backdrop-contrast: ;
            --tw-backdrop-grayscale: ;
            --tw-backdrop-hue-rotate: ;
            --tw-backdrop-invert: ;
            --tw-backdrop-opacity: ;
            --tw-backdrop-saturate: ;
            --tw-backdrop-sepia: ;
        }

        .container {
            width: 100%;
        }

        @media (min-width: 640px) {
            .container {
                max-width: 640px;
            }
        }

        @media (min-width: 768px) {
            .container {
                max-width: 768px;
            }
        }

        @media (min-width: 1024px) {
            .container {
                max-width: 1024px;
            }
        }

        @media (min-width: 1280px) {
            .container {
                max-width: 1280px;
            }
        }

        @media (min-width: 1536px) {
            .container {
                max-width: 1536px;
            }
        }

        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border-width: 0;
        }

        .pointer-events-none {
            pointer-events: none;
        }

        .visible {
            visibility: visible;
        }

        .invisible {
            visibility: hidden;
        }

        .fixed {
            position: fixed;
        }

        .absolute {
            position: absolute;
        }

        .relative {
            position: relative;
        }

        .inset-0 {
            top: 0px;
            right: 0px;
            bottom: 0px;
            left: 0px;
        }

        .inset-y-0 {
            top: 0px;
            bottom: 0px;
        }

        .left-0 {
            left: 0px;
        }

        .bottom-16 {
            bottom: 4rem;
        }

        .-right-16 {
            right: -4rem;
        }

        .-top-24 {
            top: -6rem;
        }

        .right-0 {
            right: 0px;
        }

        .isolate {
            isolation: isolate;
        }

        .z-40 {
            z-index: 40;
        }

        .z-50 {
            z-index: 50;
        }

        .col-span-2 {
            grid-column: span 2 / span 2;
        }

        .col-span-6 {
            grid-column: span 6 / span 6;
        }

        .col-span-3 {
            grid-column: span 3 / span 3;
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto;
        }

        .mx-3 {
            margin-left: 0.75rem;
            margin-right: 0.75rem;
        }

        .-mx-2 {
            margin-left: -0.5rem;
            margin-right: -0.5rem;
        }

        .my-4 {
            margin-top: 1rem;
            margin-bottom: 1rem;
        }

        .my-8 {
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        .my-10 {
            margin-top: 2.5rem;
            margin-bottom: 2.5rem;
        }

        .my-20 {
            margin-top: 5rem;
            margin-bottom: 5rem;
        }

        .ml-2 {
            margin-left: 0.5rem;
        }

        .mt-8 {
            margin-top: 2rem;
        }

        .mt-5 {
            margin-top: 1.25rem;
        }

        .mt-10 {
            margin-top: 2.5rem;
        }

        .-mt-8 {
            margin-top: -2rem;
        }

        .mt-2 {
            margin-top: 0.5rem;
        }

        .mt-4 {
            margin-top: 1rem;
        }

        .mt-3 {
            margin-top: 0.75rem;
        }

        .mt-12 {
            margin-top: 3rem;
        }

        .mt-6 {
            margin-top: 1.5rem;
        }

        .ml-1 {
            margin-left: 0.25rem;
        }

        .ml-4 {
            margin-left: 1rem;
        }

        .mb-4 {
            margin-bottom: 1rem;
        }

        .mt-1 {
            margin-top: 0.25rem;
        }

        .ml-8 {
            margin-left: 2rem;
        }

        .mb-10 {
            margin-bottom: 2.5rem;
        }

        .-mr-3 {
            margin-right: -0.75rem;
        }

        .ml-3 {
            margin-left: 0.75rem;
        }

        .mt-0 {
            margin-top: 0;
        }

        .ml-6 {
            margin-left: 1.5rem;
        }

        .mr-2 {
            margin-right: 0.5rem;
        }

        .mb-8 {
            margin-bottom: 2rem;
        }

        .ml-5 {
            margin-left: 1.25rem;
        }

        .mt-px {
            margin-top: 1px;
        }

        .mb-0 {
            margin-bottom: 0;
        }

        .mb-3 {
            margin-bottom: 0.75rem;
        }

        .mb-40 {
            margin-bottom: 10rem;
        }

        .mt-16 {
            margin-top: 4rem;
        }

        .mb-2 {
            margin-bottom: 0.5rem;
        }

        .mr-1\.5 {
            margin-right: 0.375rem;
        }

        .mr-1 {
            margin-right: 0.25rem;
        }

        .mr-3 {
            margin-right: 0.75rem;
        }

        .block {
            display: block;
        }

        .inline-block {
            display: inline-block;
        }

        .inline {
            display: inline;
        }

        .flex {
            display: flex;
        }

        .inline-flex {
            display: inline-flex;
        }

        .table {
            display: table;
        }

        .grid {
            display: grid;
        }

        .contents {
            display: contents;
        }

        .hidden {
            display: none;
        }

        .h-full {
            height: 100%;
        }

        .h-8 {
            height: 2rem;
        }

        .h-12 {
            height: 3rem;
        }

        .h-20 {
            height: 5rem;
        }

        .h-6 {
            height: 1.5rem;
        }

        .h-4 {
            height: 1rem;
        }

        .h-5 {
            height: 1.25rem;
        }

        .h-16 {
            height: 4rem;
        }

        .h-2 {
            height: 0.5rem;
        }

        .h-10 {
            height: 2.5rem;
        }

        .h-56 {
            height: 14rem;
        }

        .h-32 {
            height: 8rem;
        }

        .h-24 {
            height: 6rem;
        }

        .h-9 {
            height: 2.25rem;
        }

        .max-h-96 {
            max-height: 24rem;
        }

        .min-h-screen {
            min-height: 100vh;
        }

        .w-full {
            width: 100%;
        }

        .w-8 {
            width: 2rem;
        }

        .w-\[508px\] {
            width: 508px;
        }

        .w-24 {
            width: 6rem;
        }

        .w-28 {
            width: 7rem;
        }

        .w-12 {
            width: 3rem;
        }

        .w-\[120\%\] {
            width: 120%;
        }

        .w-20 {
            width: 5rem;
        }

        .w-6 {
            width: 1.5rem;
        }

        .w-64 {
            width: 16rem;
        }

        .w-1\/2 {
            width: 50%;
        }

        .w-4 {
            width: 1rem;
        }

        .w-5 {
            width: 1.25rem;
        }

        .w-2\/3 {
            width: 66.666667%;
        }

        .w-0 {
            width: 0px;
        }

        .w-auto {
            width: auto;
        }

        .w-32 {
            width: 8rem;
        }

        .w-1\/3 {
            width: 33.333333%;
        }

        .w-2 {
            width: 0.5rem;
        }

        .w-80 {
            width: 20rem;
        }

        .w-10 {
            width: 2.5rem;
        }

        .w-96 {
            width: 24rem;
        }

        .w-16 {
            width: 4rem;
        }

        .w-2\/5 {
            width: 40%;
        }

        .w-1\/5 {
            width: 20%;
        }

        .w-3\/5 {
            width: 60%;
        }

        .min-w-full {
            min-width: 100%;
        }

        .min-w-min {
            min-width: -moz-min-content;
            min-width: min-content;
        }

        .min-w-max {
            min-width: -moz-max-content;
            min-width: max-content;
        }

        .max-w-2xl {
            max-width: 42rem;
        }

        .max-w-7xl {
            max-width: 80rem;
        }

        .max-w-xl {
            max-width: 36rem;
        }

        .max-w-md {
            max-width: 28rem;
        }

        .max-w-\[16rem\] {
            max-width: 16rem;
        }

        .max-w-4xl {
            max-width: 56rem;
        }

        .max-w-max {
            max-width: -moz-max-content;
            max-width: max-content;
        }

        .max-w-sm {
            max-width: 24rem;
        }

        .max-w-lg {
            max-width: 32rem;
        }

        .flex-1 {
            flex: 1 1 0%;
        }

        .flex-shrink-0,
        .shrink-0 {
            flex-shrink: 0;
        }

        .shrink {
            flex-shrink: 1;
        }

        .flex-grow,
        .grow {
            flex-grow: 1;
        }

        .origin-top-right {
            transform-origin: top right;
        }

        .origin-top-left {
            transform-origin: top left;
        }

        .origin-top {
            transform-origin: top;
        }

        .-translate-x-12 {
            --tw-translate-x: -3rem;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skew(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        .-translate-y-6 {
            --tw-translate-y: -1.5rem;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skew(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        .-translate-x-1\/2 {
            --tw-translate-x: -50%;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skew(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        .translate-x-\[-10\%\] {
            --tw-translate-x: -10%;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skew(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        .-rotate-2 {
            --tw-rotate: -2deg;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skew(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        .rotate-2 {
            --tw-rotate: 2deg;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skew(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        .transform {
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skew(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        @keyframes pulse {
            50% {
                opacity: 0.5;
            }
        }

        .animate-pulse {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .animate-spin {
            animation: spin 1s linear infinite;
        }

        .cursor-pointer {
            cursor: pointer;
        }

        .list-inside {
            list-style-position: inside;
        }

        .list-disc {
            list-style-type: disc;
        }

        .grid-cols-6 {
            grid-template-columns: repeat(6, minmax(0, 1fr));
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr));
        }

        .grid-cols-4 {
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }

        .flex-row-reverse {
            flex-direction: row-reverse;
        }

        .flex-col {
            flex-direction: column;
        }

        .flex-col-reverse {
            flex-direction: column-reverse;
        }

        .flex-wrap {
            flex-wrap: wrap;
        }

        .items-start {
            align-items: flex-start;
        }

        .items-end {
            align-items: flex-end;
        }

        .items-center {
            align-items: center;
        }

        .items-baseline {
            align-items: baseline;
        }

        .justify-end {
            justify-content: flex-end;
        }

        .justify-center {
            justify-content: center;
        }

        .justify-between {
            justify-content: space-between;
        }

        .gap-10 {
            gap: 2.5rem;
        }

        .gap-5 {
            gap: 1.25rem;
        }

        .gap-6 {
            gap: 1.5rem;
        }

        .gap-12 {
            gap: 3rem;
        }

        .gap-20 {
            gap: 5rem;
        }

        .gap-4 {
            gap: 1rem;
        }

        .gap-x-6 {
            -moz-column-gap: 1.5rem;
            column-gap: 1.5rem;
        }

        .gap-x-3 {
            -moz-column-gap: 0.75rem;
            column-gap: 0.75rem;
        }

        .gap-y-4 {
            row-gap: 1rem;
        }

        .gap-x-2 {
            -moz-column-gap: 0.5rem;
            column-gap: 0.5rem;
        }

        .gap-y-10 {
            row-gap: 2.5rem;
        }

        .gap-x-4 {
            -moz-column-gap: 1rem;
            column-gap: 1rem;
        }

        .gap-y-2 {
            row-gap: 0.5rem;
        }

        .gap-y-6 {
            row-gap: 1.5rem;
        }

        .gap-y-8 {
            row-gap: 2rem;
        }

        .gap-y-24 {
            row-gap: 6rem;
        }

        .gap-x-40 {
            -moz-column-gap: 10rem;
            column-gap: 10rem;
        }

        .space-y-6> :not([hidden])~ :not([hidden]) {
            --tw-space-y-reverse: 0;
            margin-top: calc(1.5rem * calc(1 - var(--tw-space-y-reverse)));
            margin-bottom: calc(1.5rem * var(--tw-space-y-reverse));
        }

        .space-y-1> :not([hidden])~ :not([hidden]) {
            --tw-space-y-reverse: 0;
            margin-top: calc(0.25rem * calc(1 - var(--tw-space-y-reverse)));
            margin-bottom: calc(0.25rem * var(--tw-space-y-reverse));
        }

        .divide-y> :not([hidden])~ :not([hidden]) {
            --tw-divide-y-reverse: 0;
            border-top-width: calc(1px * calc(1 - var(--tw-divide-y-reverse)));
            border-bottom-width: calc(1px * var(--tw-divide-y-reverse));
        }

        .overflow-hidden {
            overflow: hidden;
        }

        .overflow-x-auto {
            overflow-x: auto;
        }

        .overflow-y-auto {
            overflow-y: auto;
        }

        .overscroll-y-contain {
            overscroll-behavior-y: contain;
        }

        .truncate {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .whitespace-pre-line {
            white-space: pre-line;
        }

        .break-words {
            overflow-wrap: break-word;
        }

        .rounded-lg {
            border-radius: 0.5rem;
        }

        .rounded-md {
            border-radius: 0.375rem;
        }

        .rounded-xl {
            border-radius: 0.75rem;
        }

        .rounded-full {
            border-radius: 9999px;
        }

        .rounded {
            border-radius: 0.25rem;
        }

        .rounded-t-lg {
            border-top-left-radius: 0.5rem;
            border-top-right-radius: 0.5rem;
        }

        .rounded-b-lg {
            border-bottom-right-radius: 0.5rem;
            border-bottom-left-radius: 0.5rem;
        }

        .rounded-l-full {
            border-top-left-radius: 9999px;
            border-bottom-left-radius: 9999px;
        }

        .border {
            border-width: 1px;
        }

        .border-2 {
            border-width: 2px;
        }

        .border-b {
            border-bottom-width: 1px;
        }

        .border-t {
            border-top-width: 1px;
        }

        .border-t-2 {
            border-top-width: 2px;
        }

        .border-r-4 {
            border-right-width: 4px;
        }

        .border-dashed {
            border-style: dashed;
        }

        .border-none {
            border-style: none;
        }

        .border-transparent {
            border-color: transparent;
        }

        .border-purple-200 {
            --tw-border-opacity: 1;
            border-color: rgb(231 227 255 / var(--tw-border-opacity));
        }

        .border-\[\#DDD8FF\] {
            --tw-border-opacity: 1;
            border-color: rgb(221 216 255 / var(--tw-border-opacity));
        }

        .border-white {
            --tw-border-opacity: 1;
            border-color: rgb(255 255 255 / var(--tw-border-opacity));
        }

        .border-cyan-600 {
            --tw-border-opacity: 1;
            border-color: rgb(74 222 128 / var(--tw-border-opacity));
        }

        .bg-white {
            --tw-bg-opacity: 1;
            background-color: rgb(255 255 255 / var(--tw-bg-opacity));
        }

        .bg-cyan-600 {
            --tw-bg-opacity: 1;
            background-color: rgb(74 222 128 / var(--tw-bg-opacity));
        }

        .bg-purple-50 {
            --tw-bg-opacity: 1;
            background-color: rgb(248 247 255 / var(--tw-bg-opacity));
        }

        .bg-gray-800 {
            --tw-bg-opacity: 1;
            background-color: rgb(38 44 65 / var(--tw-bg-opacity));
        }

        .bg-transparent {
            background-color: transparent;
        }

        .bg-gray-50 {
            --tw-bg-opacity: 1;
            background-color: rgb(248 248 250 / var(--tw-bg-opacity));
        }

        .bg-gradient-to-b {
            background-image: linear-gradient(to bottom, var(--tw-gradient-stops));
        }

        .bg-gradient-to-r {
            background-image: linear-gradient(to right, var(--tw-gradient-stops));
        }

        /* .bg-\[url\(\.\.\/img\/dots\.svg\)\] {
            background-image: url(https://d2n6cmh8j179w8.cloudfront.net/9f5a9986-56bd-4cd9-9709-7cadd1f5c199/build/assets/dots-6b14a7af.svg);
        } */

        .from-gray-800 {
            --tw-gradient-from: #262c41;
            --tw-gradient-to: rgb(38 44 65 / 0);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }

        .from-white {
            --tw-gradient-from: #ffffff;
            --tw-gradient-to: rgb(255 255 255 / 0);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }

        .from-transparent {
            --tw-gradient-from: transparent;
            --tw-gradient-to: rgb(0 0 0 / 0);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }

        .from-gray-50 {
            --tw-gradient-from: #f8f8fa;
            --tw-gradient-to: rgb(248 248 250 / 0);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }

        .to-black {
            --tw-gradient-to: #000000;
        }

        .to-purple-50 {
            --tw-gradient-to: #f8f7ff;
        }

        .bg-repeat {
            background-repeat: repeat;
        }

        .object-cover {
            -o-object-fit: cover;
            object-fit: cover;
        }

        .object-center {
            -o-object-position: center;
            object-position: center;
        }

        .p-6 {
            padding: 1.5rem;
        }

        .p-10 {
            padding: 2.5rem;
        }

        .p-4 {
            padding: 1rem;
        }

        .p-3 {
            padding: 0.75rem;
        }

        .p-12 {
            padding: 3rem;
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        .py-6 {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem;
        }

        .px-14 {
            padding-left: 3.5rem;
            padding-right: 3.5rem;
        }

        .py-12 {
            padding-top: 3rem;
            padding-bottom: 3rem;
        }

        .py-8 {
            padding-top: 2rem;
            padding-bottom: 2rem;
        }

        .py-16 {
            padding-top: 4rem;
            padding-bottom: 4rem;
        }

        .px-4 {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .px-2 {
            padding-left: 0.5rem;
            padding-right: 0.5rem;
        }

        .py-2 {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }

        .py-1 {
            padding-top: 0.25rem;
            padding-bottom: 0.25rem;
        }

        .px-1 {
            padding-left: 0.25rem;
            padding-right: 0.25rem;
        }

        .py-3 {
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
        }

        .px-8 {
            padding-left: 2rem;
            padding-right: 2rem;
        }

        .px-12 {
            padding-left: 3rem;
            padding-right: 3rem;
        }

        .px-3 {
            padding-left: 0.75rem;
            padding-right: 0.75rem;
        }

        .py-0\.5 {
            padding-top: 0.125rem;
            padding-bottom: 0.125rem;
        }

        .py-0 {
            padding-top: 0;
            padding-bottom: 0;
        }

        .px-5 {
            padding-left: 1.25rem;
            padding-right: 1.25rem;
        }

        .pt-24 {
            padding-top: 6rem;
        }

        .pt-6 {
            padding-top: 1.5rem;
        }

        .pr-10 {
            padding-right: 2.5rem;
        }

        .pr-6 {
            padding-right: 1.5rem;
        }

        .pt-3 {
            padding-top: 0.75rem;
        }

        .pb-4 {
            padding-bottom: 1rem;
        }

        .pt-4 {
            padding-top: 1rem;
        }

        .pb-12 {
            padding-bottom: 3rem;
        }

        .pl-12 {
            padding-left: 3rem;
        }

        .pr-4 {
            padding-right: 1rem;
        }

        .pl-3 {
            padding-left: 0.75rem;
        }

        .pt-12 {
            padding-top: 3rem;
        }

        .pb-6 {
            padding-bottom: 1.5rem;
        }

        .pl-6 {
            padding-left: 1.5rem;
        }

        .pt-2 {
            padding-top: 0.5rem;
        }

        .pl-4 {
            padding-left: 1rem;
        }

        .pr-2\.5 {
            padding-right: 0.625rem;
        }

        .pr-2 {
            padding-right: 0.5rem;
        }

        .pl-2 {
            padding-left: 0.5rem;
        }

        .pb-40 {
            padding-bottom: 10rem;
        }

        .pt-1 {
            padding-top: 0.25rem;
        }

        .text-left {
            text-align: left;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .align-middle {
            vertical-align: middle;
        }

        .font-sans {
            font-family: Untitled Sans, ui-sans-serif, system-ui, -apple-system,
                BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans,
                sans-serif, "Apple Color Emoji", "Segoe UI Emoji", Segoe UI Symbol,
                "Noto Color Emoji";
        }

        .font-mono {
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas,
                Liberation Mono, Courier New, monospace;
        }

        .text-lg {
            font-size: 1.125rem;
            line-height: 1.75rem;
        }

        .text-5xl {
            font-size: 2rem;
            line-height: 1;
        }

        .text-xl {
            font-size: 1.25rem;
            line-height: 1.75rem;
        }

        .text-4xl {
            font-size: 2.25rem;
            line-height: 2.5rem;
        }

        .text-2xl {
            font-size: 1.5rem;
            line-height: 2rem;
        }

        .text-\[56px\] {
            font-size: 56px;
        }

        .text-sm {
            font-size: 0.875rem;
            line-height: 1.25rem;
        }

        .text-xs {
            font-size: 0.75rem;
            line-height: 1rem;
        }

        .text-base {
            font-size: 1rem;
            line-height: 1.5rem;
        }

        .text-3xl {
            font-size: 1.875rem;
            line-height: 2.25rem;
        }

        .font-bold {
            font-weight: 700;
        }

        .font-medium {
            font-weight: 500;
        }

        .font-light {
            font-weight: 300;
        }

        .font-normal {
            font-weight: 400;
        }

        .font-semibold {
            font-weight: 600;
        }

        .uppercase {
            text-transform: uppercase;
        }

        .capitalize {
            text-transform: capitalize;
        }

        .leading-none {
            line-height: 1;
        }

        .leading-tight {
            line-height: 1.25;
        }

        .leading-relaxed {
            line-height: 1.625;
        }

        .leading-snug {
            line-height: 1.375;
        }

        .tracking-wide {
            letter-spacing: 0.025em;
        }

        .tracking-wider {
            letter-spacing: 0.05em;
        }

        .tracking-widest {
            letter-spacing: 0.1em;
        }

        .text-white {
            --tw-text-opacity: 1;
            color: rgb(255 255 255 / var(--tw-text-opacity));
        }

        .text-cyan-600 {
            --tw-text-opacity: 1;
            color: rgb(74 222 128 / var(--tw-text-opacity));
        }

        .text-gray-800 {
            --tw-text-opacity: 1;
            color: rgb(38 44 65 / var(--tw-text-opacity));
        }

        .text-transparent {
            color: transparent;
        }

        .underline {
            text-decoration-line: underline;
        }

        .no-underline {
            text-decoration-line: none;
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .opacity-75 {
            opacity: 0.75;
        }

        .opacity-50 {
            opacity: 0.5;
        }

        .shadow-md {
            --tw-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1),
                0 2px 4px -2px rgb(0 0 0 / 0.1);
            --tw-shadow-colored: 0 4px 6px -1px var(--tw-shadow-color),
                0 2px 4px -2px var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000),
                var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        }

        .shadow-sm {
            --tw-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --tw-shadow-colored: 0 1px 2px 0 var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000),
                var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        }

        .shadow-none {
            --tw-shadow: 0 0 #0000;
            --tw-shadow-colored: 0 0 #0000;
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000),
                var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        }

        .shadow-lg {
            --tw-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1),
                0 4px 6px -4px rgb(0 0 0 / 0.1);
            --tw-shadow-colored: 0 10px 15px -3px var(--tw-shadow-color),
                0 4px 6px -4px var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000),
                var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        }

        .shadow-2xl {
            --tw-shadow: 0 25px 50px -12px rgb(0 0 0 / 0.25);
            --tw-shadow-colored: 0 25px 50px -12px var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000),
                var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        }

        .shadow {
            --tw-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
            --tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color),
                0 1px 2px -1px var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000),
                var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        }

        .shadow-xl {
            --tw-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1),
                0 8px 10px -6px rgb(0 0 0 / 0.1);
            --tw-shadow-colored: 0 20px 25px -5px var(--tw-shadow-color),
                0 8px 10px -6px var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000),
                var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        }

        .filter {
            filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow);
        }

        .backdrop-blur-md {
            --tw-backdrop-blur: blur(12px);
            -webkit-backdrop-filter: var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia);
            backdrop-filter: var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia);
        }

        .transition-all {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 0.15s;
        }

        .transition {
            transition-property: color, background-color, border-color,
                text-decoration-color, fill, stroke, opacity, box-shadow, transform,
                filter, -webkit-backdrop-filter;
            transition-property: color, background-color, border-color,
                text-decoration-color, fill, stroke, opacity, box-shadow, transform,
                filter, backdrop-filter;
            transition-property: color, background-color, border-color,
                text-decoration-color, fill, stroke, opacity, box-shadow, transform,
                filter, backdrop-filter, -webkit-backdrop-filter;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 0.15s;
        }

        .hover\:rotate-0:hover {
            --tw-rotate: 0deg;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skew(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        .hover\:rounded-l-full:hover {
            border-top-left-radius: 9999px;
            border-bottom-left-radius: 9999px;
        }

        .hover\:underline:hover {
            text-decoration-line: underline;
        }

        .hover\:opacity-100:hover {
            opacity: 1;
        }

        .focus\:bg-white:focus {
            --tw-bg-opacity: 1;
            background-color: rgb(255 255 255 / var(--tw-bg-opacity));
        }

        .focus\:opacity-100:focus {
            opacity: 1;
        }

        .focus\:outline-none:focus {
            outline: 2px solid transparent;
            outline-offset: 2px;
        }

        .focus\:ring-2:focus {
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow),
                var(--tw-shadow, 0 0 #0000);
        }

        .focus\:ring-offset-2:focus {
            --tw-ring-offset-width: 2px;
        }

        .disabled\:cursor-not-allowed:disabled {
            cursor: not-allowed;
        }

        .disabled\:opacity-50:disabled {
            opacity: 0.5;
        }

        .group:hover .group-hover\:text-gray-800 {
            --tw-text-opacity: 1;
            color: rgb(38 44 65 / var(--tw-text-opacity));
        }

        .group:hover .group-hover\:opacity-75 {
            opacity: 0.75;
        }

        @media (prefers-color-scheme: dark) {
            .dark\:divide-gray-800> :not([hidden])~ :not([hidden]) {
                --tw-divide-opacity: 1;
                border-color: rgb(38 44 65 / var(--tw-divide-opacity));
            }

            .dark\:border {
                border-width: 1px;
            }

            .dark\:border-none {
                border-style: none;
            }

            .dark\:bg-gray-800 {
                --tw-bg-opacity: 1;
                background-color: rgb(38 44 65 / var(--tw-bg-opacity));
            }

            .dark\:bg-transparent {
                background-color: transparent;
            }

            .dark\:to-gray-800 {
                --tw-gradient-to: #262c41;
            }

            .dark\:text-white {
                --tw-text-opacity: 1;
                color: rgb(255 255 255 / var(--tw-text-opacity));
            }

            .dark\:opacity-90 {
                opacity: 0.9;
            }

            .dark\:opacity-80 {
                opacity: 0.8;
            }

            .dark\:shadow-none {
                --tw-shadow: 0 0 #0000;
                --tw-shadow-colored: 0 0 #0000;
                box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000),
                    var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
            }

            .dark\:hover\:bg-gray-800:hover {
                --tw-bg-opacity: 1;
                background-color: rgb(38 44 65 / var(--tw-bg-opacity));
            }
        }

        @media (min-width: 640px) {
            .sm\:relative {
                position: relative;
            }

            .sm\:mt-16 {
                margin-top: 4rem;
            }

            .sm\:ml-auto {
                margin-left: auto;
            }

            .sm\:-mr-20 {
                margin-right: -5rem;
            }

            .sm\:mt-8 {
                margin-top: 2rem;
            }

            .sm\:mt-10 {
                margin-top: 2.5rem;
            }

            .sm\:h-full {
                height: 100%;
            }

            .sm\:w-auto {
                width: auto;
            }

            .sm\:max-w-\[34rem\] {
                max-width: 34rem;
            }

            .sm\:max-w-lg {
                max-width: 32rem;
            }

            .sm\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .sm\:grid-cols-4 {
                grid-template-columns: repeat(4, minmax(0, 1fr));
            }

            .sm\:grid-cols-3 {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .sm\:grid-rows-1 {
                grid-template-rows: repeat(1, minmax(0, 1fr));
            }

            .sm\:flex-row {
                flex-direction: row;
            }

            .sm\:items-center {
                align-items: center;
            }

            .sm\:gap-0 {
                gap: 0px;
            }

            .sm\:gap-y-12 {
                row-gap: 3rem;
            }

            .sm\:gap-x-6 {
                -moz-column-gap: 1.5rem;
                column-gap: 1.5rem;
            }

            .sm\:py-16 {
                padding-top: 4rem;
                padding-bottom: 4rem;
            }

            .sm\:text-6xl {
                font-size: 3.75rem;
                line-height: 1;
            }

            .sm\:text-5xl {
                font-size: 2rem;
                line-height: 1;
            }
        }

        @media (min-width: 768px) {
            .md\:absolute {
                position: absolute;
            }

            .md\:bottom-0 {
                bottom: 0px;
            }

            .md\:-right-16 {
                right: -4rem;
            }

            .md\:col-start-3 {
                grid-column-start: 3;
            }

            .md\:col-start-4 {
                grid-column-start: 4;
            }

            .md\:mx-auto {
                margin-left: auto;
                margin-right: auto;
            }

            .md\:mt-20 {
                margin-top: 5rem;
            }

            .md\:mr-0 {
                margin-right: 0;
            }

            .md\:mt-24 {
                margin-top: 6rem;
            }

            .md\:inline-block {
                display: inline-block;
            }

            .md\:w-\[134px\] {
                width: 134px;
            }

            .md\:w-\[157px\] {
                width: 157px;
            }

            .md\:max-w-2xl {
                max-width: 42rem;
            }

            .md\:translate-x-0 {
                --tw-translate-x: 0px;
                transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skew(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
            }

            .md\:-translate-y-12 {
                --tw-translate-y: -3rem;
                transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skew(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
            }

            .md\:grid-cols-4 {
                grid-template-columns: repeat(4, minmax(0, 1fr));
            }

            .md\:flex-row {
                flex-direction: row;
            }

            .md\:px-12 {
                padding-left: 3rem;
                padding-right: 3rem;
            }

            .md\:py-24 {
                padding-top: 6rem;
                padding-bottom: 6rem;
            }

            .md\:pb-12 {
                padding-bottom: 3rem;
            }

            .md\:text-7xl {
                font-size: 4.5rem;
                line-height: 1;
            }
        }

        @media (min-width: 1024px) {
            .lg\:relative {
                position: relative;
            }

            .lg\:order-first {
                order: -9999;
            }

            .lg\:col-start-5 {
                grid-column-start: 5;
            }

            .lg\:col-start-6 {
                grid-column-start: 6;
            }

            .lg\:mt-28 {
                margin-top: 7rem;
            }

            .lg\:mt-0 {
                margin-top: 0;
            }

            .lg\:-ml-12 {
                margin-left: -3rem;
            }

            .lg\:mt-32 {
                margin-top: 8rem;
            }

            .lg\:w-\[809px\] {
                width: 809px;
            }

            .lg\:max-w-\[46rem\] {
                max-width: 46rem;
            }

            .lg\:max-w-md {
                max-width: 28rem;
            }

            .lg\:-rotate-2 {
                --tw-rotate: -2deg;
                transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skew(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
            }

            .lg\:grid-cols-3 {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .lg\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .lg\:grid-cols-6 {
                grid-template-columns: repeat(6, minmax(0, 1fr));
            }

            .lg\:flex-row {
                flex-direction: row;
            }

            .lg\:items-start {
                align-items: flex-start;
            }

            .lg\:gap-8 {
                gap: 2rem;
            }

            .lg\:gap-y-32 {
                row-gap: 8rem;
            }

            .lg\:py-10 {
                padding-top: 2.5rem;
                padding-bottom: 2.5rem;
            }

            .lg\:pb-48 {
                padding-bottom: 12rem;
            }

            .lg\:pr-24 {
                padding-right: 6rem;
            }

            .lg\:pt-40 {
                padding-top: 10rem;
            }

            .lg\:pb-32 {
                padding-bottom: 8rem;
            }

            .lg\:text-\[80px\] {
                font-size: 80px;
            }

            .lg\:text-6xl {
                font-size: 3.75rem;
                line-height: 1;
            }
        }

        @media (min-width: 1280px) {
            .xl\:absolute {
                position: absolute;
            }

            .xl\:top-20 {
                top: 5rem;
            }

            .xl\:-right-\[78px\] {
                right: -78px;
            }

            .xl\:block {
                display: block;
            }
        }
    </style>
</head>

<body class="bg-gray-50  bg-[url(../img/dots.svg)] bg-repeat  font-sans text-gray-800 antialiased">
    <!-- Header -->
    <div class="mx-auto flex max-w-7xl items-center justify-between px-6 pt-6">
        <a href="/" class="inline-flex items-center">
            <svg class="" w-16" id="svg" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="80" viewBox="0, 0, 400,204.58452722063038">
                <g id="svgg">
                    <path id="path0" d="M194.527 18.140 C 194.330 18.195,194.169 18.325,194.169 18.429 C 194.169 18.534,193.347 18.619,192.342 18.619 C 190.991 18.619,190.435 18.699,190.208 18.926 C 190.024 19.110,189.524 19.233,188.960 19.233 C 188.311 19.233,187.981 19.328,187.900 19.540 C 187.819 19.750,187.483 19.849,186.832 19.853 C 186.310 19.857,185.704 19.995,185.485 20.160 C 185.267 20.325,184.733 20.460,184.299 20.460 C 183.720 20.460,183.384 20.597,183.036 20.972 C 182.761 21.268,182.335 21.483,182.023 21.483 C 181.680 21.483,181.483 21.595,181.483 21.790 C 181.483 21.995,181.279 22.097,180.870 22.097 C 180.460 22.097,180.256 22.199,180.256 22.404 C 180.256 22.619,180.039 22.711,179.533 22.711 C 179.080 22.711,178.767 22.825,178.693 23.018 C 178.628 23.187,178.447 23.325,178.290 23.325 C 178.133 23.325,178.005 23.417,178.005 23.529 C 178.005 23.642,177.772 23.734,177.487 23.734 C 177.202 23.734,176.916 23.872,176.851 24.041 C 176.787 24.210,176.513 24.348,176.244 24.348 C 175.945 24.348,175.754 24.467,175.754 24.655 C 175.754 24.824,175.616 24.962,175.448 24.962 C 175.279 24.962,175.141 25.100,175.141 25.269 C 175.141 25.461,174.947 25.575,174.623 25.575 C 174.338 25.575,174.052 25.714,173.987 25.882 C 173.922 26.051,173.741 26.189,173.584 26.189 C 173.427 26.189,173.299 26.280,173.299 26.390 C 173.299 26.500,173.069 26.648,172.788 26.719 C 172.506 26.790,172.276 26.930,172.276 27.030 C 172.276 27.130,172.138 27.212,171.969 27.212 C 171.801 27.212,171.662 27.350,171.662 27.519 C 171.662 27.688,171.524 27.826,171.355 27.826 C 171.187 27.826,171.049 27.953,171.049 28.109 C 171.049 28.265,170.887 28.446,170.691 28.512 C 169.904 28.776,167.161 31.248,167.161 31.692 C 167.161 31.817,167.023 31.918,166.854 31.918 C 166.685 31.918,166.547 32.056,166.547 32.225 C 166.547 32.394,166.460 32.532,166.353 32.532 C 166.076 32.532,164.706 33.978,164.706 34.270 C 164.706 34.403,164.476 34.617,164.194 34.745 C 163.908 34.876,163.683 35.151,163.683 35.370 C 163.683 35.616,163.494 35.809,163.173 35.889 C 162.770 35.990,162.636 36.187,162.533 36.832 C 162.455 37.323,162.291 37.647,162.122 37.647 C 161.968 37.647,161.841 37.785,161.841 37.954 C 161.841 38.123,161.760 38.261,161.661 38.261 C 161.561 38.261,161.426 38.422,161.360 38.619 C 161.294 38.816,161.130 39.161,160.997 39.386 C 160.473 40.268,160.393 40.421,160.281 40.753 C 160.217 40.942,160.035 41.147,159.878 41.207 C 159.720 41.268,159.591 41.504,159.591 41.733 C 159.591 41.961,159.503 42.148,159.396 42.148 C 159.289 42.148,159.053 42.494,158.872 42.916 C 158.691 43.338,158.410 43.944,158.248 44.262 C 158.086 44.581,157.954 44.979,157.954 45.146 C 157.954 45.314,157.816 45.589,157.647 45.758 C 157.478 45.927,157.340 46.325,157.340 46.642 C 157.340 46.967,157.206 47.271,157.033 47.337 C 156.864 47.402,156.726 47.681,156.726 47.956 C 156.726 48.232,156.628 48.490,156.509 48.530 C 156.389 48.569,156.244 49.014,156.186 49.518 C 156.128 50.022,156.004 50.619,155.911 50.844 C 155.417 52.027,155.090 53.504,155.090 54.543 C 155.090 55.359,154.994 55.779,154.773 55.940 C 154.295 56.290,154.294 70.359,154.772 70.708 C 155.002 70.876,155.090 71.304,155.090 72.258 C 155.090 72.983,155.186 73.672,155.305 73.791 C 155.423 73.909,155.561 74.411,155.610 74.905 C 155.659 75.400,155.792 75.835,155.906 75.873 C 156.020 75.911,156.113 76.291,156.113 76.718 C 156.113 77.159,156.245 77.605,156.419 77.749 C 156.588 77.889,156.726 78.304,156.726 78.670 C 156.726 79.036,156.864 79.451,157.033 79.591 C 157.202 79.731,157.340 80.104,157.340 80.420 C 157.340 80.735,157.478 81.132,157.647 81.301 C 157.816 81.469,157.954 81.752,157.954 81.929 C 157.954 82.106,158.072 82.251,158.217 82.251 C 158.362 82.251,158.496 82.456,158.515 82.708 C 158.534 82.959,158.646 83.197,158.763 83.237 C 158.881 83.276,158.977 83.519,158.977 83.777 C 158.977 84.035,159.115 84.361,159.284 84.501 C 159.453 84.641,159.591 84.918,159.591 85.115 C 159.591 85.313,159.729 85.589,159.898 85.729 C 160.066 85.869,160.205 86.113,160.205 86.272 C 160.205 86.430,160.343 86.613,160.512 86.678 C 160.680 86.743,160.818 86.871,160.818 86.964 C 160.818 87.222,162.204 89.489,162.662 89.981 C 162.886 90.221,163.069 90.606,163.069 90.835 C 163.069 91.065,163.146 91.253,163.240 91.253 C 163.333 91.253,163.679 91.542,164.007 91.894 C 164.335 92.246,165.156 93.098,165.831 93.787 C 166.506 94.475,167.381 95.476,167.775 96.010 C 168.169 96.544,168.698 97.038,168.951 97.106 C 169.205 97.175,169.412 97.313,169.412 97.413 C 169.412 97.514,169.550 97.596,169.719 97.596 C 169.887 97.596,170.026 97.734,170.026 97.903 C 170.026 98.075,170.208 98.210,170.441 98.210 C 170.670 98.210,170.910 98.348,170.975 98.517 C 171.039 98.685,171.221 98.824,171.377 98.824 C 171.534 98.824,171.662 98.962,171.662 99.130 C 171.662 99.299,171.747 99.437,171.850 99.437 C 171.953 99.437,172.432 99.806,172.915 100.256 C 173.398 100.706,173.948 101.074,174.138 101.074 C 174.328 101.074,174.536 101.212,174.601 101.381 C 174.666 101.550,174.952 101.688,175.237 101.688 C 175.561 101.688,175.754 101.803,175.754 101.995 C 175.754 102.182,175.945 102.302,176.244 102.302 C 176.513 102.302,176.787 102.440,176.851 102.609 C 176.916 102.777,177.134 102.916,177.336 102.916 C 177.537 102.916,177.951 103.146,178.254 103.427 C 178.582 103.731,179.049 103.939,179.407 103.939 C 179.752 103.939,180.057 104.069,180.125 104.246 C 180.194 104.425,180.501 104.552,180.863 104.552 C 181.278 104.552,181.483 104.654,181.483 104.859 C 181.483 105.047,181.674 105.166,181.973 105.166 C 182.242 105.166,182.516 105.304,182.580 105.473 C 182.645 105.642,182.875 105.780,183.090 105.780 C 183.306 105.780,183.746 105.918,184.069 106.086 C 184.391 106.254,184.902 106.392,185.205 106.393 C 185.508 106.393,185.813 106.486,185.882 106.598 C 185.952 106.711,186.375 106.803,186.822 106.803 C 187.355 106.803,187.675 106.908,187.752 107.110 C 187.836 107.329,188.179 107.417,188.951 107.417 C 189.724 107.417,190.067 107.505,190.151 107.724 C 190.238 107.952,190.601 108.031,191.564 108.031 C 192.328 108.031,192.964 108.136,193.115 108.286 C 193.542 108.715,204.853 108.775,205.276 108.352 C 205.506 108.122,206.001 108.031,207.019 108.031 C 208.033 108.031,208.514 107.943,208.696 107.724 C 208.863 107.522,209.321 107.417,210.036 107.417 C 210.728 107.417,211.233 107.306,211.429 107.110 C 211.597 106.941,212.059 106.803,212.454 106.803 C 212.849 106.803,213.223 106.722,213.285 106.622 C 213.346 106.523,213.820 106.378,214.337 106.300 C 214.855 106.222,215.699 105.936,216.212 105.663 C 216.725 105.390,217.306 105.166,217.502 105.166 C 217.698 105.166,217.912 105.028,217.977 104.859 C 218.042 104.691,218.328 104.552,218.613 104.552 C 218.936 104.552,219.130 104.438,219.130 104.246 C 219.130 104.057,219.322 103.939,219.625 103.939 C 220.148 103.939,221.378 103.329,221.380 103.069 C 221.380 102.985,221.614 102.916,221.899 102.916 C 222.184 102.916,222.470 102.777,222.535 102.609 C 222.599 102.440,222.781 102.302,222.937 102.302 C 223.094 102.302,223.223 102.164,223.223 101.995 C 223.223 101.808,223.413 101.688,223.709 101.688 C 223.977 101.688,224.310 101.550,224.450 101.381 C 224.590 101.212,224.810 101.074,224.938 101.074 C 225.066 101.074,225.419 100.844,225.722 100.563 C 226.025 100.281,226.353 100.051,226.449 100.051 C 226.545 100.051,226.889 99.775,227.212 99.437 C 227.536 99.100,227.889 98.824,227.998 98.824 C 228.107 98.824,228.547 98.455,228.975 98.005 C 229.403 97.555,229.851 97.187,229.971 97.187 C 230.382 97.187,233.453 93.779,233.453 93.322 C 233.453 93.197,233.591 93.095,233.760 93.095 C 233.928 93.095,234.066 92.957,234.066 92.788 C 234.066 92.619,234.167 92.481,234.290 92.481 C 234.954 92.481,236.313 90.868,236.316 90.077 C 236.317 89.805,236.443 89.616,236.624 89.616 C 236.793 89.616,236.931 89.478,236.931 89.309 C 236.931 89.141,237.008 89.003,237.102 89.003 C 237.403 89.003,239.182 86.086,239.182 85.591 C 239.182 85.304,239.304 85.115,239.488 85.115 C 239.693 85.115,239.795 84.910,239.795 84.501 C 239.795 84.092,239.898 83.887,240.102 83.887 C 240.271 83.887,240.409 83.743,240.409 83.567 C 240.409 83.391,240.628 82.953,240.895 82.595 C 241.163 82.237,241.443 81.598,241.518 81.176 C 241.594 80.754,241.743 80.409,241.851 80.409 C 241.958 80.409,242.046 80.281,242.046 80.124 C 242.046 79.967,242.164 79.794,242.308 79.739 C 242.471 79.676,242.588 79.187,242.618 78.438 C 242.649 77.661,242.773 77.158,242.970 77.011 C 243.137 76.886,243.277 76.471,243.280 76.090 C 243.284 75.709,243.422 75.218,243.587 74.999 C 243.752 74.781,243.887 74.178,243.887 73.659 C 243.887 73.140,243.988 72.616,244.110 72.494 C 244.232 72.371,244.384 71.522,244.446 70.605 C 244.509 69.689,244.639 68.890,244.736 68.831 C 244.980 68.679,244.960 57.829,244.714 57.584 C 244.606 57.476,244.468 56.703,244.407 55.867 C 244.346 55.030,244.217 54.295,244.120 54.232 C 244.024 54.169,243.898 53.444,243.840 52.620 C 243.783 51.796,243.632 51.018,243.505 50.891 C 243.378 50.764,243.274 50.458,243.274 50.211 C 243.274 49.964,243.136 49.709,242.967 49.645 C 242.773 49.570,242.660 49.257,242.660 48.798 C 242.660 48.339,242.546 48.025,242.353 47.951 C 242.178 47.884,242.046 47.579,242.046 47.242 C 242.046 46.916,241.954 46.650,241.841 46.650 C 241.729 46.650,241.636 46.488,241.636 46.292 C 241.635 46.095,241.497 45.670,241.329 45.347 C 241.161 45.025,241.023 44.645,241.023 44.503 C 241.023 44.361,240.885 44.130,240.716 43.990 C 240.547 43.850,240.409 43.516,240.409 43.249 C 240.409 42.953,240.289 42.762,240.102 42.762 C 239.900 42.762,239.795 42.560,239.795 42.170 C 239.795 41.833,239.663 41.528,239.488 41.461 C 239.320 41.396,239.182 41.207,239.182 41.040 C 239.182 40.873,238.951 40.489,238.670 40.185 C 238.389 39.882,238.159 39.467,238.159 39.264 C 238.159 39.061,238.043 38.821,237.903 38.731 C 237.603 38.540,237.174 37.901,237.003 37.391 C 236.937 37.194,236.756 37.033,236.600 37.033 C 236.445 37.033,236.317 36.868,236.317 36.666 C 236.317 36.464,235.955 35.910,235.511 35.435 C 235.068 34.960,234.648 34.389,234.577 34.166 C 234.506 33.943,234.224 33.704,233.951 33.636 C 233.677 33.567,233.453 33.432,233.453 33.335 C 233.453 33.186,232.725 32.320,232.004 31.611 C 231.889 31.499,231.639 31.234,231.448 31.024 C 231.256 30.813,230.974 30.537,230.821 30.410 C 230.668 30.283,230.160 29.788,229.692 29.309 C 229.224 28.831,228.769 28.440,228.680 28.440 C 228.592 28.440,228.271 28.182,227.968 27.867 C 227.160 27.028,226.064 26.274,225.422 26.115 C 225.113 26.039,224.859 25.887,224.859 25.776 C 224.859 25.666,224.721 25.575,224.552 25.575 C 224.384 25.575,224.246 25.437,224.246 25.269 C 224.246 25.078,224.052 24.962,223.734 24.962 C 223.416 24.962,223.223 24.846,223.223 24.655 C 223.223 24.486,223.084 24.348,222.916 24.348 C 222.747 24.348,222.609 24.258,222.609 24.147 C 222.609 24.037,222.355 23.884,222.046 23.809 C 221.737 23.733,221.437 23.616,221.381 23.549 C 221.325 23.482,220.844 23.214,220.312 22.955 C 219.780 22.695,219.291 22.396,219.225 22.290 C 219.160 22.184,218.841 22.097,218.517 22.097 C 218.192 22.097,217.876 22.015,217.814 21.914 C 217.615 21.592,216.066 20.870,215.575 20.870 C 215.314 20.870,214.812 20.725,214.459 20.549 C 214.105 20.373,213.732 20.280,213.630 20.343 C 213.528 20.406,213.392 20.320,213.327 20.152 C 213.247 19.945,212.919 19.847,212.305 19.847 C 211.689 19.847,211.362 19.748,211.282 19.540 C 211.197 19.319,210.852 19.233,210.057 19.233 C 209.323 19.233,208.865 19.129,208.696 18.926 C 208.509 18.701,208.014 18.619,206.846 18.619 C 205.752 18.619,205.225 18.539,205.166 18.363 C 205.081 18.107,195.375 17.903,194.527 18.140 M203.409 19.046 C 203.637 19.168,204.690 19.320,205.748 19.383 C 206.807 19.446,207.673 19.565,207.673 19.648 C 207.673 19.731,208.270 19.863,209.000 19.941 C 209.731 20.019,210.381 20.168,210.445 20.272 C 210.509 20.376,210.855 20.461,211.214 20.462 C 211.573 20.462,212.131 20.600,212.453 20.769 C 212.775 20.937,213.295 21.074,213.608 21.074 C 213.924 21.074,214.228 21.210,214.294 21.381 C 214.363 21.560,214.669 21.688,215.032 21.688 C 215.373 21.688,215.652 21.773,215.652 21.876 C 215.652 21.980,215.951 22.130,216.317 22.209 C 216.683 22.289,217.164 22.480,217.386 22.635 C 217.608 22.789,217.953 22.916,218.153 22.916 C 218.353 22.916,218.517 23.008,218.517 23.120 C 218.517 23.233,218.614 23.325,218.732 23.325 C 219.131 23.325,220.767 24.151,220.767 24.353 C 220.767 24.463,220.940 24.552,221.151 24.552 C 221.363 24.552,221.650 24.691,221.790 24.859 C 221.930 25.028,222.172 25.166,222.327 25.166 C 222.482 25.166,222.609 25.248,222.609 25.349 C 222.609 25.449,222.839 25.589,223.120 25.659 C 223.402 25.730,223.632 25.878,223.632 25.989 C 223.632 26.099,223.757 26.189,223.911 26.189 C 224.064 26.189,224.502 26.464,224.883 26.800 C 225.264 27.136,225.648 27.412,225.738 27.414 C 225.920 27.417,225.987 27.471,227.417 28.746 C 227.980 29.248,228.502 29.661,228.578 29.663 C 228.796 29.670,232.882 33.767,233.665 34.764 C 234.055 35.260,234.670 35.997,235.034 36.401 C 235.397 36.805,235.696 37.251,235.699 37.391 C 235.701 37.532,235.795 37.647,235.908 37.647 C 236.020 37.647,236.113 37.788,236.113 37.960 C 236.113 38.133,236.251 38.327,236.419 38.391 C 236.588 38.456,236.726 38.601,236.726 38.714 C 236.726 38.826,237.003 39.267,237.340 39.693 C 237.678 40.119,237.954 40.606,237.954 40.775 C 237.954 40.944,238.092 41.135,238.261 41.199 C 238.430 41.264,238.568 41.451,238.568 41.614 C 238.568 41.960,239.213 43.242,239.437 43.342 C 239.522 43.379,239.591 43.575,239.591 43.777 C 239.591 43.979,239.729 44.259,239.898 44.399 C 240.066 44.539,240.205 44.863,240.205 45.118 C 240.205 45.374,240.343 45.636,240.512 45.701 C 240.680 45.765,240.818 46.058,240.818 46.351 C 240.818 46.644,240.957 47.022,241.125 47.190 C 241.294 47.359,241.432 47.767,241.432 48.096 C 241.432 48.426,241.524 48.696,241.637 48.696 C 241.749 48.696,241.842 48.903,241.843 49.156 C 241.843 49.409,241.981 49.880,242.150 50.202 C 242.318 50.525,242.459 51.031,242.462 51.328 C 242.466 51.624,242.601 52.097,242.762 52.379 C 242.923 52.660,243.058 53.316,243.062 53.837 C 243.066 54.421,243.187 54.881,243.376 55.038 C 243.598 55.223,243.683 55.712,243.683 56.816 C 243.683 57.654,243.782 58.524,243.903 58.750 C 244.220 59.343,244.238 67.281,243.924 67.864 C 243.791 68.110,243.683 68.990,243.683 69.820 C 243.683 70.830,243.584 71.460,243.382 71.726 C 243.210 71.954,243.079 72.579,243.076 73.197 C 243.072 73.788,242.981 74.271,242.874 74.271 C 242.766 74.271,242.620 74.616,242.549 75.038 C 242.478 75.460,242.289 76.096,242.130 76.450 C 241.971 76.805,241.841 77.283,241.841 77.512 C 241.841 77.742,241.749 77.987,241.637 78.056 C 241.524 78.126,241.432 78.370,241.432 78.599 C 241.432 78.829,241.308 79.261,241.156 79.559 C 241.005 79.858,240.716 80.471,240.515 80.921 C 239.755 82.623,239.485 83.174,239.363 83.274 C 239.293 83.330,239.166 83.604,239.079 83.882 C 238.853 84.605,236.115 89.003,235.891 89.003 C 235.788 89.003,235.703 89.127,235.703 89.278 C 235.703 89.430,235.542 89.740,235.345 89.967 C 234.700 90.713,233.970 91.622,233.657 92.070 C 233.193 92.735,229.800 96.113,228.751 96.956 C 228.242 97.364,227.780 97.753,227.724 97.820 C 227.471 98.121,224.258 100.399,223.574 100.763 C 223.156 100.985,222.813 101.238,222.813 101.325 C 222.813 101.412,222.626 101.483,222.398 101.483 C 222.169 101.483,221.929 101.621,221.864 101.790 C 221.799 101.959,221.583 102.097,221.384 102.097 C 221.185 102.097,220.907 102.235,220.767 102.404 C 220.627 102.573,220.386 102.711,220.231 102.711 C 220.076 102.711,219.949 102.803,219.949 102.916 C 219.949 103.028,219.810 103.120,219.641 103.120 C 219.472 103.120,218.990 103.304,218.570 103.529 C 218.150 103.754,217.690 103.939,217.548 103.939 C 217.405 103.939,217.289 104.031,217.289 104.143 C 217.289 104.256,217.065 104.348,216.792 104.348 C 216.519 104.348,216.157 104.486,215.988 104.655 C 215.820 104.824,215.456 104.962,215.180 104.962 C 214.905 104.962,214.565 105.100,214.425 105.269 C 214.284 105.437,213.898 105.575,213.566 105.575 C 213.235 105.575,212.825 105.714,212.656 105.882 C 212.487 106.051,212.039 106.189,211.660 106.189 C 211.281 106.189,210.919 106.272,210.857 106.373 C 210.794 106.474,210.098 106.622,209.310 106.701 C 208.522 106.780,207.877 106.915,207.877 107.002 C 207.877 107.089,207.137 107.203,206.233 107.255 C 205.328 107.307,204.481 107.457,204.351 107.588 C 204.025 107.914,194.758 107.924,194.433 107.599 C 194.309 107.475,193.577 107.325,192.807 107.266 C 192.037 107.207,191.315 107.088,191.202 107.001 C 191.090 106.914,190.376 106.778,189.616 106.697 C 188.857 106.617,188.235 106.469,188.235 106.370 C 188.235 106.271,187.950 106.189,187.602 106.189 C 187.254 106.189,186.724 106.064,186.425 105.911 C 185.769 105.574,184.636 105.165,183.939 105.013 C 183.657 104.952,183.245 104.777,183.024 104.625 C 182.802 104.473,182.418 104.348,182.171 104.348 C 181.924 104.348,181.691 104.279,181.654 104.194 C 181.616 104.110,180.619 103.554,179.437 102.958 C 177.103 101.781,176.633 101.514,176.209 101.125 C 176.055 100.985,175.798 100.870,175.638 100.870 C 175.477 100.870,175.345 100.777,175.345 100.665 C 175.345 100.552,175.246 100.460,175.125 100.460 C 174.940 100.460,172.930 99.018,172.140 98.318 C 172.009 98.202,171.595 97.882,171.220 97.606 C 170.515 97.088,164.910 91.517,164.910 91.335 C 164.910 91.278,164.266 90.367,163.478 89.309 C 162.691 88.252,162.046 87.290,162.046 87.172 C 162.046 87.053,161.954 86.957,161.841 86.957 C 161.729 86.957,161.637 86.825,161.637 86.664 C 161.637 86.503,161.522 86.246,161.381 86.092 C 161.097 85.782,160.666 85.009,159.748 83.171 C 159.411 82.496,159.008 81.699,158.852 81.401 C 158.695 81.102,158.568 80.711,158.568 80.531 C 158.568 80.352,158.476 80.205,158.363 80.205 C 158.251 80.205,158.158 80.043,158.157 79.847 C 158.157 79.650,158.019 79.225,157.850 78.902 C 157.682 78.580,157.545 78.160,157.545 77.970 C 157.545 77.779,157.410 77.444,157.244 77.226 C 157.079 77.007,156.941 76.593,156.937 76.305 C 156.934 76.017,156.796 75.603,156.631 75.384 C 156.465 75.166,156.327 74.647,156.324 74.232 C 156.320 73.817,156.238 73.428,156.141 73.368 C 156.045 73.308,155.901 72.546,155.822 71.674 C 155.743 70.802,155.570 69.958,155.438 69.798 C 155.109 69.403,155.104 57.256,155.432 56.852 C 155.556 56.698,155.724 55.905,155.804 55.089 C 155.884 54.272,156.032 53.553,156.133 53.491 C 156.234 53.428,156.317 52.980,156.317 52.494 C 156.317 51.958,156.438 51.510,156.624 51.355 C 156.793 51.215,156.931 50.783,156.931 50.395 C 156.931 50.007,157.069 49.551,157.238 49.383 C 157.407 49.214,157.545 48.806,157.545 48.476 C 157.545 48.147,157.633 47.877,157.740 47.877 C 157.848 47.877,157.996 47.555,158.070 47.161 C 158.144 46.767,158.286 46.445,158.386 46.445 C 158.486 46.445,158.568 46.298,158.568 46.119 C 158.568 45.939,158.699 45.548,158.859 45.249 C 159.019 44.950,159.202 44.568,159.267 44.399 C 159.331 44.230,159.462 43.954,159.557 43.785 C 160.054 42.907,160.228 42.583,160.657 41.739 C 160.914 41.233,161.171 40.772,161.227 40.716 C 161.408 40.536,161.836 39.809,162.041 39.335 C 162.151 39.082,162.335 38.875,162.450 38.875 C 162.565 38.875,162.660 38.773,162.660 38.648 C 162.660 38.438,163.636 37.090,164.257 36.442 C 164.407 36.285,164.683 35.917,164.872 35.623 C 165.893 34.030,170.708 29.327,172.509 28.164 C 172.831 27.956,173.095 27.703,173.095 27.601 C 173.095 27.500,173.196 27.417,173.321 27.417 C 173.445 27.417,173.896 27.141,174.322 26.803 C 174.749 26.465,175.191 26.189,175.307 26.189 C 175.422 26.189,175.546 26.117,175.584 26.028 C 175.669 25.826,177.742 24.552,177.986 24.552 C 178.085 24.552,178.219 24.414,178.284 24.246 C 178.348 24.077,178.581 23.939,178.801 23.939 C 179.226 23.939,180.517 23.325,180.631 23.069 C 180.668 22.985,180.838 22.916,181.008 22.916 C 181.179 22.916,181.562 22.793,181.861 22.644 C 182.160 22.495,182.711 22.219,183.086 22.030 C 183.460 21.842,183.926 21.688,184.121 21.688 C 184.315 21.688,184.653 21.553,184.871 21.388 C 185.090 21.222,185.465 21.084,185.706 21.081 C 185.946 21.077,186.406 20.937,186.729 20.769 C 187.051 20.600,187.608 20.462,187.967 20.462 C 188.327 20.461,188.671 20.379,188.732 20.280 C 188.793 20.180,189.374 20.033,190.023 19.953 C 190.671 19.873,191.294 19.736,191.407 19.650 C 191.519 19.564,192.417 19.439,193.402 19.373 C 194.387 19.307,195.354 19.159,195.550 19.044 C 196.042 18.758,202.873 18.759,203.409 19.046 M172.208 44.945 C 171.901 45.252,172.054 80.626,172.364 80.935 C 172.598 81.169,173.470 81.228,176.717 81.228 C 181.829 81.228,181.483 81.493,181.483 77.573 C 181.483 74.507,181.901 73.343,183.180 72.849 C 183.664 72.662,184.552 73.352,184.552 73.914 C 184.552 74.066,184.655 74.292,184.781 74.418 C 185.032 74.669,185.448 75.359,185.759 76.042 C 185.869 76.284,186.057 76.542,186.177 76.616 C 186.296 76.690,186.394 76.929,186.394 77.148 C 186.394 77.366,186.468 77.545,186.559 77.545 C 186.650 77.545,186.896 77.936,187.105 78.414 C 187.550 79.429,188.169 80.350,188.747 80.856 C 189.323 81.360,198.261 81.422,198.261 80.921 C 198.261 80.752,198.376 80.612,198.517 80.611 C 198.696 80.608,198.705 80.563,198.544 80.457 C 198.419 80.375,198.251 80.100,198.172 79.847 C 198.093 79.593,197.954 79.386,197.862 79.386 C 197.770 79.386,197.641 79.225,197.575 79.028 C 197.508 78.831,197.360 78.509,197.244 78.312 C 196.805 77.566,196.617 77.225,196.425 76.829 C 196.316 76.604,195.949 75.959,195.610 75.396 C 195.271 74.834,194.906 74.175,194.799 73.933 C 194.691 73.691,194.505 73.432,194.386 73.358 C 194.267 73.284,194.169 73.055,194.169 72.849 C 194.169 72.642,194.031 72.420,193.862 72.356 C 193.693 72.291,193.555 72.051,193.555 71.822 C 193.555 71.594,193.465 71.407,193.354 71.407 C 193.244 71.407,193.096 71.176,193.025 70.895 C 192.955 70.614,192.825 70.384,192.737 70.384 C 192.648 70.384,192.519 70.153,192.448 69.872 C 192.377 69.591,192.229 69.361,192.119 69.361 C 192.008 69.361,191.918 69.236,191.918 69.084 C 191.918 68.932,191.642 68.427,191.304 67.961 C 190.967 67.495,190.688 66.998,190.684 66.856 C 190.680 66.714,190.542 66.420,190.377 66.201 C 189.871 65.532,190.002 64.541,190.691 63.836 C 191.028 63.491,191.304 63.127,191.304 63.028 C 191.304 62.929,191.378 62.817,191.467 62.779 C 191.556 62.742,192.257 61.928,193.025 60.972 C 193.792 60.015,194.818 58.772,195.304 58.210 C 195.790 57.647,196.516 56.772,196.917 56.266 C 197.318 55.760,197.767 55.207,197.915 55.038 C 198.732 54.107,198.325 54.015,193.387 54.017 C 187.974 54.018,188.001 54.010,186.598 56.111 C 186.317 56.532,186.018 56.878,185.934 56.878 C 185.849 56.879,185.780 56.973,185.780 57.086 C 185.780 57.200,185.556 57.545,185.283 57.853 C 184.843 58.350,184.277 59.025,183.782 59.642 C 183.692 59.754,183.269 60.307,182.841 60.870 C 181.557 62.561,181.591 62.753,181.532 53.624 C 181.495 47.936,181.408 45.270,181.251 45.082 C 181.009 44.790,172.492 44.661,172.208 44.945 M200.962 45.054 C 200.508 45.508,200.618 80.596,201.074 80.943 C 201.577 81.324,209.255 81.334,209.755 80.954 C 209.946 80.808,210.128 80.336,210.164 79.888 C 210.245 78.903,210.634 78.774,211.392 79.479 C 212.127 80.164,214.119 81.226,214.685 81.235 C 214.936 81.239,215.371 81.374,215.652 81.535 C 216.359 81.939,219.297 81.934,219.835 81.528 C 220.053 81.363,220.536 81.228,220.909 81.228 C 221.281 81.228,221.586 81.143,221.586 81.039 C 221.586 80.936,221.862 80.790,222.199 80.716 C 222.537 80.642,222.813 80.507,222.813 80.417 C 222.813 80.326,222.974 80.198,223.171 80.132 C 224.205 79.785,226.286 77.740,226.844 76.522 C 226.921 76.353,227.105 76.093,227.252 75.944 C 227.399 75.796,227.519 75.543,227.519 75.382 C 227.519 75.221,227.611 75.090,227.724 75.090 C 227.836 75.090,227.928 74.825,227.928 74.501 C 227.928 74.177,228.066 73.797,228.235 73.657 C 228.404 73.517,228.545 73.069,228.549 72.660 C 228.552 72.252,228.690 71.739,228.856 71.521 C 229.301 70.933,229.295 64.206,228.849 63.836 C 228.670 63.687,228.539 63.231,228.536 62.737 C 228.532 62.273,228.394 61.714,228.229 61.495 C 228.064 61.277,227.928 60.893,227.928 60.643 C 227.928 60.392,227.859 60.157,227.775 60.119 C 227.691 60.082,227.407 59.653,227.146 59.165 C 226.695 58.327,226.314 57.820,225.371 56.808 C 224.753 56.144,223.296 55.038,223.040 55.038 C 222.915 55.038,222.813 54.954,222.813 54.850 C 222.813 54.746,222.538 54.601,222.202 54.527 C 221.866 54.454,221.538 54.308,221.474 54.204 C 221.409 54.100,221.063 54.012,220.704 54.008 C 220.345 54.004,219.821 53.869,219.540 53.708 C 218.850 53.314,216.495 53.319,215.971 53.715 C 215.753 53.880,215.333 54.015,215.038 54.015 C 214.276 54.015,212.985 54.686,211.643 55.779 C 210.106 57.031,210.135 57.123,210.131 50.882 C 210.129 47.638,210.046 45.447,209.916 45.204 C 209.657 44.719,201.434 44.581,200.962 45.054 M180.284 45.846 C 179.927 45.989,179.856 46.107,180.012 46.296 C 180.129 46.437,180.200 47.037,180.169 47.631 C 180.139 48.225,180.192 48.759,180.287 48.817 C 180.382 48.876,180.460 50.893,180.460 53.299 C 180.460 55.995,180.539 57.723,180.665 57.801 C 180.987 58.000,180.903 58.869,180.549 59.005 C 180.216 59.133,180.325 59.978,180.692 60.119 C 180.941 60.215,180.915 62.404,180.665 62.404 C 180.552 62.404,180.460 62.532,180.460 62.687 C 180.460 63.063,181.422 63.692,181.587 63.425 C 181.656 63.314,181.891 63.223,182.109 63.223 C 182.328 63.223,182.506 63.124,182.506 63.004 C 182.506 62.879,182.681 62.841,182.913 62.915 C 183.272 63.029,183.306 62.973,183.199 62.441 C 183.087 61.881,183.116 61.846,183.611 61.941 C 183.994 62.014,184.143 61.956,184.143 61.734 C 184.143 61.564,184.294 61.367,184.478 61.296 C 184.783 61.179,184.780 61.132,184.446 60.763 C 184.092 60.371,184.094 60.358,184.521 60.358 C 185.343 60.358,186.172 59.118,185.524 58.857 C 185.349 58.786,185.365 58.748,185.575 58.737 C 185.744 58.728,186.066 58.444,186.292 58.107 C 186.517 57.770,186.770 57.495,186.854 57.494 C 186.939 57.494,187.008 57.318,187.008 57.104 C 187.008 56.820,187.115 56.741,187.400 56.816 C 187.888 56.944,188.505 56.084,188.323 55.528 C 188.218 55.205,188.235 55.192,188.425 55.448 C 188.621 55.710,188.721 55.674,189.117 55.192 C 189.638 54.559,190.081 54.489,190.755 54.930 C 191.159 55.195,191.284 55.195,191.794 54.930 C 192.218 54.710,192.989 54.639,194.653 54.665 C 195.906 54.685,196.540 54.736,196.061 54.779 C 195.157 54.860,194.792 55.511,195.499 55.783 C 195.668 55.848,195.806 56.029,195.806 56.186 C 195.806 56.342,195.668 56.471,195.499 56.471 C 195.330 56.471,195.192 56.563,195.192 56.675 C 195.192 56.932,194.535 57.598,193.996 57.886 C 193.772 58.006,193.527 58.381,193.453 58.720 C 193.379 59.058,193.233 59.335,193.130 59.335 C 193.026 59.335,192.941 59.473,192.941 59.642 C 192.941 59.817,192.757 59.949,192.514 59.949 C 192.230 59.949,192.012 60.149,191.861 60.548 C 191.737 60.877,191.443 61.234,191.208 61.341 C 190.447 61.688,189.463 62.636,189.463 63.022 C 189.463 63.230,189.273 63.460,189.042 63.533 C 188.235 63.789,187.978 66.087,188.756 66.087 C 188.920 66.087,189.054 66.253,189.054 66.456 C 189.054 66.659,189.376 67.137,189.770 67.519 C 190.164 67.901,190.486 68.336,190.486 68.486 C 190.486 68.637,190.624 68.813,190.793 68.877 C 190.962 68.942,191.100 69.218,191.100 69.491 C 191.100 69.764,191.238 70.040,191.407 70.105 C 191.575 70.170,191.714 70.440,191.714 70.706 C 191.714 71.006,191.947 71.362,192.327 71.644 C 192.733 71.943,192.941 72.276,192.941 72.624 C 192.941 72.913,193.171 73.398,193.453 73.702 C 193.734 74.005,193.964 74.444,193.964 74.678 C 193.964 74.911,194.094 75.152,194.253 75.213 C 194.411 75.274,194.597 75.547,194.666 75.820 C 194.734 76.094,194.881 76.317,194.991 76.317 C 195.101 76.317,195.192 76.458,195.192 76.630 C 195.192 76.803,195.330 76.997,195.499 77.062 C 195.668 77.126,195.806 77.309,195.806 77.467 C 195.806 77.625,195.916 77.932,196.052 78.149 C 196.245 78.458,196.241 78.649,196.031 79.040 C 195.592 79.861,195.807 80.291,196.728 80.431 C 197.177 80.500,195.856 80.569,193.792 80.585 C 189.821 80.616,189.292 80.481,189.265 79.429 C 189.261 79.284,188.872 78.809,188.400 78.373 C 187.702 77.728,187.587 77.525,187.786 77.286 C 187.983 77.049,187.922 76.875,187.475 76.398 C 187.170 76.072,186.917 75.691,186.913 75.552 C 186.909 75.412,186.652 75.029,186.343 74.700 C 186.033 74.372,185.780 73.930,185.780 73.719 C 185.780 73.262,185.123 71.924,184.633 71.382 C 184.076 70.767,182.448 70.846,182.014 71.509 C 181.829 71.790,181.497 72.020,181.274 72.020 C 181.052 72.020,180.870 72.108,180.870 72.215 C 180.870 72.321,180.635 72.661,180.349 72.970 C 179.737 73.631,179.762 74.291,180.409 74.575 C 180.906 74.793,180.989 74.992,180.665 75.192 C 180.552 75.261,180.460 76.083,180.460 77.017 C 180.460 77.951,180.402 79.142,180.330 79.665 L 180.200 80.614 176.750 80.614 C 173.440 80.614,173.039 80.547,173.513 80.073 C 173.660 79.925,173.629 79.780,173.410 79.598 C 173.237 79.454,173.095 79.077,173.095 78.759 C 173.095 78.442,173.003 78.126,172.890 78.056 C 172.777 77.987,172.685 77.572,172.685 77.136 C 172.685 76.699,172.777 76.284,172.890 76.215 C 173.023 76.133,173.095 71.818,173.095 63.939 C 173.095 56.059,173.023 51.744,172.890 51.662 C 172.776 51.592,172.685 50.637,172.685 49.502 C 172.685 48.282,172.767 47.468,172.890 47.468 C 173.179 47.468,173.145 46.168,172.849 45.872 C 172.658 45.681,173.511 45.629,176.685 45.640 C 179.469 45.648,180.613 45.714,180.284 45.846 M208.821 49.770 C 208.751 52.049,208.641 54.375,208.576 54.940 C 208.471 55.853,208.518 56.031,209.001 56.551 C 209.379 56.960,209.478 57.202,209.329 57.351 C 209.020 57.660,209.449 58.107,210.053 58.107 C 210.322 58.107,210.712 58.213,210.919 58.342 C 211.373 58.626,212.174 57.957,212.174 57.295 C 212.174 57.073,212.450 56.688,212.788 56.438 C 213.125 56.189,213.402 55.818,213.402 55.614 C 213.402 55.346,213.558 55.243,213.964 55.242 C 214.274 55.241,214.791 55.103,215.113 54.935 C 215.435 54.767,215.913 54.629,216.175 54.629 C 216.437 54.629,216.708 54.537,216.777 54.425 C 216.847 54.312,217.307 54.220,217.801 54.220 C 218.294 54.220,218.754 54.312,218.824 54.425 C 218.893 54.537,219.405 54.629,219.961 54.629 C 220.723 54.629,220.972 54.705,220.972 54.936 C 220.972 55.128,221.166 55.243,221.490 55.243 C 221.775 55.243,222.061 55.381,222.125 55.550 C 222.190 55.719,222.354 55.857,222.490 55.857 C 222.626 55.857,223.001 56.133,223.325 56.471 C 223.648 56.808,223.995 57.084,224.095 57.084 C 224.353 57.084,225.473 58.236,225.473 58.501 C 225.473 58.622,225.601 58.721,225.758 58.721 C 225.914 58.721,226.100 58.951,226.171 59.233 C 226.242 59.514,226.390 59.744,226.500 59.744 C 226.610 59.744,226.701 59.882,226.701 60.051 C 226.701 60.220,226.839 60.358,227.008 60.358 C 227.222 60.358,227.315 60.574,227.315 61.077 C 227.315 61.472,227.402 61.956,227.509 62.151 C 227.615 62.347,227.759 62.942,227.827 63.473 C 227.896 64.005,228.039 64.494,228.145 64.560 C 228.493 64.775,228.387 71.111,228.031 71.407 C 227.862 71.547,227.724 71.875,227.724 72.136 C 227.724 72.397,227.632 72.667,227.519 72.737 C 227.407 72.806,227.315 73.170,227.315 73.545 C 227.315 73.963,227.196 74.273,227.008 74.345 C 226.839 74.410,226.701 74.653,226.701 74.885 C 226.701 75.117,226.563 75.360,226.394 75.425 C 226.225 75.490,226.087 75.763,226.087 76.032 C 226.087 76.331,225.967 76.522,225.780 76.522 C 225.611 76.522,225.473 76.660,225.473 76.829 C 225.473 76.997,225.335 77.136,225.166 77.136 C 224.997 77.136,224.859 77.231,224.859 77.347 C 224.859 77.463,224.698 77.617,224.501 77.690 C 223.932 77.900,223.230 78.637,223.226 79.028 C 223.224 79.250,223.065 79.386,222.807 79.386 C 222.578 79.386,222.338 79.524,222.273 79.693 C 222.206 79.868,221.901 80.000,221.564 80.000 C 221.174 80.000,220.972 80.105,220.972 80.307 C 220.972 80.543,220.710 80.614,219.847 80.614 C 219.228 80.614,218.721 80.706,218.721 80.818 C 218.721 80.931,218.261 81.023,217.698 81.023 C 217.136 81.023,216.675 80.953,216.675 80.868 C 216.675 80.533,215.397 80.138,215.039 80.362 C 214.749 80.543,214.607 80.445,214.199 79.784 C 213.883 79.272,213.555 78.986,213.277 78.982 C 213.022 78.979,212.523 78.599,212.060 78.056 C 211.156 76.995,209.841 76.749,209.183 77.518 C 208.910 77.836,208.031 80.047,208.148 80.121 C 208.168 80.134,208.368 80.247,208.593 80.373 C 208.908 80.548,208.183 80.603,205.473 80.608 C 202.078 80.614,201.944 80.598,201.944 80.205 C 201.944 79.980,202.036 79.795,202.148 79.795 C 202.412 79.795,202.417 79.033,202.154 78.943 C 202.028 78.900,201.934 72.787,201.898 62.251 L 201.841 45.627 205.394 45.627 L 208.947 45.627 208.821 49.770 M179.989 60.284 C 179.825 60.448,180.010 60.767,180.268 60.767 C 180.374 60.767,180.460 60.629,180.460 60.460 C 180.460 60.144,180.219 60.054,179.989 60.284 M214.834 60.346 C 213.730 60.954,212.498 61.196,212.020 60.901 C 211.657 60.677,211.406 60.889,211.263 61.542 C 211.194 61.853,210.935 62.197,210.686 62.307 C 210.436 62.417,210.199 62.691,210.157 62.916 C 210.116 63.141,209.954 63.398,209.798 63.488 C 209.642 63.578,209.514 63.838,209.514 64.066 C 209.514 64.293,209.376 64.617,209.207 64.786 C 208.969 65.025,208.900 65.638,208.900 67.540 C 208.900 69.527,208.958 70.009,209.207 70.105 C 209.393 70.176,209.514 70.486,209.514 70.890 C 209.514 71.541,210.830 73.516,211.388 73.702 C 211.513 73.744,211.717 74.089,211.843 74.469 C 212.139 75.364,212.458 75.450,213.062 74.798 C 213.673 74.139,213.888 74.136,214.183 74.783 C 214.447 75.364,215.381 75.501,215.578 74.987 C 215.643 74.818,215.824 74.680,215.981 74.680 C 216.138 74.680,216.266 74.588,216.266 74.476 C 216.266 74.363,216.536 74.271,216.865 74.271 C 217.195 74.271,217.602 74.133,217.771 73.964 C 217.940 73.795,218.177 73.657,218.297 73.657 C 218.418 73.657,218.517 73.519,218.517 73.350 C 218.517 73.182,218.655 73.043,218.824 73.043 C 218.992 73.043,219.130 72.912,219.130 72.751 C 219.130 72.590,219.325 72.429,219.562 72.393 C 220.648 72.228,222.075 66.745,221.176 66.189 C 221.064 66.120,220.972 65.839,220.972 65.565 C 220.972 64.686,220.117 63.017,219.601 62.887 C 219.342 62.822,219.130 62.641,219.130 62.484 C 219.130 62.328,218.992 62.199,218.824 62.199 C 218.655 62.199,218.517 62.021,218.517 61.802 C 218.517 61.287,218.325 61.183,217.106 61.039 C 216.352 60.949,216.070 60.822,215.995 60.536 C 215.891 60.139,215.366 60.053,214.834 60.346 M218.316 63.054 C 218.989 63.727,219.540 64.448,219.540 64.656 C 219.540 64.865,219.678 65.173,219.847 65.342 C 220.078 65.573,220.153 66.148,220.153 67.684 C 220.153 69.244,220.082 69.779,219.847 69.974 C 219.678 70.115,219.540 70.405,219.540 70.621 C 219.540 70.836,218.993 71.552,218.325 72.212 C 216.995 73.526,216.578 73.647,213.936 73.485 C 212.360 73.389,210.128 71.170,210.128 69.700 C 210.128 69.527,210.036 69.328,209.923 69.258 C 209.666 69.099,209.652 66.152,209.908 65.994 C 210.011 65.930,210.160 65.579,210.239 65.215 C 210.970 61.805,215.780 60.518,218.316 63.054 M211.202 75.634 C 210.511 75.913,210.930 76.726,211.765 76.726 C 212.492 76.726,212.583 76.672,212.583 76.237 C 212.583 75.613,211.945 75.334,211.202 75.634 M137.529 120.967 C 137.397 121.099,137.289 121.294,137.289 121.399 C 137.289 121.505,137.145 121.697,136.970 121.825 C 136.689 122.030,136.653 123.119,136.669 130.948 C 136.683 137.970,136.634 139.784,136.435 139.586 C 136.297 139.448,136.066 139.335,135.920 139.335 C 135.662 139.335,135.145 138.971,134.394 138.261 C 134.186 138.064,133.923 137.903,133.811 137.903 C 133.698 137.903,133.606 137.673,133.606 137.391 C 133.606 136.877,133.141 136.678,132.890 137.084 C 132.705 137.384,132.190 137.334,131.838 136.982 C 131.636 136.781,131.128 136.675,130.359 136.675 C 129.694 136.675,129.076 136.565,128.931 136.419 C 128.761 136.249,127.997 136.164,126.650 136.164 C 125.302 136.164,124.538 136.249,124.368 136.419 C 124.218 136.570,123.581 136.675,122.817 136.675 C 121.854 136.675,121.491 136.754,121.404 136.982 C 121.327 137.183,121.008 137.289,120.483 137.289 C 119.958 137.289,119.639 137.395,119.562 137.596 C 119.498 137.765,119.266 137.903,119.048 137.903 C 118.830 137.903,118.421 138.133,118.140 138.414 C 117.859 138.696,117.545 138.926,117.444 138.926 C 117.174 138.926,116.012 140.211,116.011 140.512 C 116.011 140.652,115.872 140.767,115.703 140.767 C 115.535 140.767,115.396 140.884,115.396 141.026 C 115.396 141.168,115.166 141.457,114.885 141.668 C 114.604 141.879,114.373 142.219,114.373 142.423 C 114.373 142.626,114.253 142.867,114.105 142.957 C 113.629 143.247,113.146 144.117,113.146 144.683 C 113.146 144.986,113.048 145.267,112.928 145.307 C 112.808 145.347,112.658 145.769,112.594 146.245 C 112.530 146.721,112.398 147.110,112.300 147.110 C 112.203 147.110,112.123 147.745,112.123 148.520 C 112.123 149.622,112.051 149.958,111.797 150.056 C 111.367 150.221,111.434 161.644,111.867 162.077 C 112.008 162.217,112.123 162.499,112.123 162.704 C 112.123 162.908,112.210 163.234,112.316 163.430 C 112.423 163.625,112.565 164.130,112.632 164.552 C 112.700 164.974,112.843 165.320,112.950 165.320 C 113.058 165.320,113.146 165.513,113.146 165.748 C 113.146 166.157,113.590 167.112,114.088 167.775 C 114.215 167.944,114.377 168.329,114.449 168.631 C 114.520 168.933,114.758 169.237,114.977 169.306 C 115.196 169.376,115.432 169.612,115.502 169.831 C 115.571 170.050,115.852 170.285,116.126 170.354 C 116.400 170.423,116.624 170.607,116.624 170.764 C 116.624 170.920,116.762 171.049,116.931 171.049 C 117.100 171.049,117.238 171.187,117.238 171.355 C 117.238 171.524,117.376 171.662,117.545 171.662 C 117.714 171.662,117.852 171.753,117.852 171.863 C 117.852 171.973,118.082 172.122,118.363 172.192 C 118.645 172.263,118.875 172.403,118.875 172.503 C 118.875 172.603,119.002 172.685,119.157 172.685 C 119.312 172.685,119.553 172.824,119.693 172.992 C 119.833 173.161,120.249 173.299,120.617 173.299 C 121.023 173.299,121.332 173.420,121.404 173.606 C 121.504 173.867,122.257 173.913,126.445 173.913 C 130.633 173.913,131.386 173.867,131.486 173.606 C 131.564 173.403,131.889 173.298,132.452 173.296 C 133.075 173.293,133.421 173.164,133.760 172.806 C 134.013 172.539,134.473 172.257,134.782 172.180 C 135.550 171.987,135.808 171.737,135.962 171.034 C 136.111 170.356,136.471 170.221,136.471 170.844 C 136.471 171.069,136.563 171.253,136.675 171.253 C 136.788 171.253,136.880 171.074,136.880 170.856 C 136.880 170.638,136.972 170.402,137.084 170.332 C 137.214 170.252,137.280 170.751,137.265 171.701 C 137.252 172.524,137.198 173.030,137.146 172.827 C 136.987 172.214,135.959 172.446,135.959 173.095 C 135.959 173.755,138.260 174.128,139.068 173.599 C 139.616 173.240,146.382 173.154,146.598 173.504 C 146.668 173.616,146.944 173.708,147.212 173.708 C 147.480 173.708,147.757 173.616,147.826 173.504 C 147.896 173.391,148.500 173.299,149.168 173.299 L 150.384 173.299 150.384 147.519 C 150.384 127.458,150.329 121.739,150.136 121.739 C 149.999 121.739,149.683 121.486,149.433 121.176 C 149.043 120.693,148.927 120.650,148.607 120.871 C 147.929 121.340,147.673 121.397,147.297 121.162 C 147.060 121.014,146.879 121.002,146.800 121.130 C 146.728 121.247,145.311 121.330,143.380 121.330 C 140.600 121.330,140.025 121.383,139.709 121.669 C 139.358 121.987,139.335 121.980,139.335 121.560 C 139.335 121.314,139.220 121.077,139.079 121.034 C 138.245 120.777,137.741 120.755,137.529 120.967 M184.557 121.018 C 184.365 121.249,183.880 121.330,182.680 121.330 C 181.430 121.330,181.035 121.400,180.944 121.637 C 180.879 121.806,180.698 121.944,180.541 121.944 C 180.299 121.944,180.256 125.778,180.256 147.403 L 180.256 172.862 180.850 173.285 C 181.495 173.745,182.000 173.826,182.199 173.504 C 182.278 173.377,184.077 173.299,186.917 173.299 C 189.842 173.299,191.509 173.374,191.509 173.504 C 191.509 173.800,191.966 173.755,192.705 173.387 C 193.349 173.065,193.350 173.062,193.350 171.412 L 193.350 169.758 193.760 170.230 C 193.985 170.490,194.169 170.780,194.169 170.875 C 194.169 170.971,194.307 171.049,194.476 171.049 C 194.645 171.049,194.783 171.139,194.783 171.249 C 194.783 171.360,195.006 171.506,195.279 171.575 C 195.553 171.643,195.826 171.829,195.887 171.988 C 195.948 172.146,196.184 172.276,196.413 172.276 C 196.642 172.276,196.829 172.368,196.829 172.481 C 196.829 172.593,196.955 172.685,197.110 172.685 C 197.266 172.685,197.507 172.824,197.647 172.992 C 197.787 173.161,198.170 173.299,198.497 173.299 C 198.837 173.299,199.143 173.431,199.210 173.606 C 199.302 173.847,199.716 173.913,201.122 173.913 C 202.468 173.913,202.980 173.990,203.171 174.220 C 203.311 174.389,203.730 174.527,204.103 174.527 C 204.475 174.527,204.917 174.389,205.086 174.220 C 205.311 173.995,205.860 173.913,207.147 173.913 C 208.569 173.913,208.900 173.855,208.900 173.606 C 208.900 173.380,209.136 173.299,209.796 173.299 C 210.342 173.299,210.791 173.180,210.946 172.992 C 211.086 172.824,211.328 172.685,211.483 172.685 C 211.638 172.685,211.765 172.603,211.765 172.503 C 211.765 172.403,211.995 172.263,212.276 172.192 C 212.558 172.122,212.788 171.973,212.788 171.863 C 212.788 171.753,212.926 171.662,213.095 171.662 C 213.263 171.662,213.402 171.524,213.402 171.355 C 213.402 171.187,213.563 171.049,213.760 171.049 C 214.148 171.050,215.644 169.470,215.649 169.054 C 215.651 168.913,215.747 168.798,215.862 168.798 C 215.977 168.798,216.161 168.591,216.271 168.338 C 216.511 167.781,216.892 167.174,217.238 166.797 C 217.379 166.644,217.494 166.258,217.494 165.941 C 217.494 165.616,217.628 165.312,217.801 165.246 C 217.969 165.181,218.107 164.900,218.107 164.622 C 218.107 164.344,218.190 164.065,218.290 164.003 C 218.391 163.941,218.522 163.544,218.581 163.121 C 218.640 162.699,218.783 161.939,218.900 161.432 C 219.017 160.926,219.117 158.837,219.122 156.790 C 219.127 154.539,219.211 153.018,219.335 152.941 C 219.448 152.872,219.540 152.549,219.540 152.225 C 219.540 151.901,219.448 151.578,219.335 151.509 C 219.223 151.439,219.130 150.928,219.130 150.372 C 219.130 149.699,219.045 149.360,218.875 149.360 C 218.703 149.360,218.603 148.945,218.572 148.095 C 218.546 147.400,218.430 146.737,218.316 146.623 C 218.201 146.508,218.107 146.220,218.107 145.983 C 218.107 145.746,217.972 145.373,217.807 145.154 C 217.642 144.936,217.504 144.511,217.500 144.210 C 217.496 143.881,217.249 143.418,216.880 143.049 C 216.542 142.712,216.266 142.265,216.266 142.056 C 216.266 141.847,216.105 141.528,215.908 141.346 C 215.711 141.164,215.238 140.683,214.856 140.278 C 214.475 139.872,214.078 139.540,213.975 139.540 C 213.871 139.540,213.838 139.456,213.902 139.354 C 214.117 139.005,213.760 138.494,213.324 138.528 C 212.458 138.596,212.206 138.506,211.560 137.903 C 211.095 137.468,210.698 137.289,210.202 137.289 C 209.768 137.289,209.456 137.172,209.383 136.982 C 209.300 136.764,208.959 136.675,208.203 136.675 C 207.619 136.675,207.036 136.571,206.908 136.443 C 206.567 136.102,201.702 136.080,201.587 136.419 C 201.532 136.581,201.101 136.675,200.417 136.675 C 199.704 136.675,199.247 136.780,199.079 136.982 C 198.939 137.151,198.555 137.289,198.226 137.289 C 197.843 137.289,197.449 137.482,197.130 137.825 C 196.857 138.120,196.332 138.423,195.964 138.498 C 195.482 138.596,195.276 138.761,195.229 139.087 C 195.193 139.336,195.042 139.540,194.893 139.540 C 194.744 139.540,194.569 139.678,194.504 139.847 C 194.333 140.293,193.964 140.223,193.964 139.744 C 193.964 139.519,194.056 139.335,194.169 139.335 C 194.301 139.335,194.373 136.844,194.373 132.270 C 194.373 126.178,194.416 125.188,194.680 125.087 C 195.164 124.901,195.093 123.581,194.600 123.581 C 194.165 123.581,193.964 123.200,193.964 122.377 C 193.964 121.375,193.770 121.330,189.489 121.330 C 186.206 121.330,185.445 121.275,185.161 121.018 C 184.851 120.738,184.789 120.738,184.557 121.018 M41.809 121.137 C 41.668 121.279,39.793 121.348,36.387 121.337 C 30.249 121.318,28.994 121.637,29.844 122.999 C 30.027 123.291,30.083 129.470,30.072 148.245 C 30.057 174.273,30.057 174.261,30.872 173.445 C 31.053 173.264,31.207 173.268,31.511 173.458 C 31.995 173.760,32.737 173.788,32.737 173.504 C 32.737 173.374,34.373 173.299,37.238 173.299 L 41.739 173.299 41.739 173.811 C 41.739 174.266,41.823 174.322,42.506 174.319 C 43.309 174.315,44.433 173.471,43.996 173.201 C 43.685 173.008,43.706 159.530,44.017 159.634 C 44.145 159.676,44.352 160.029,44.477 160.418 C 44.635 160.907,44.848 161.145,45.166 161.191 C 45.496 161.238,45.627 161.394,45.627 161.743 C 45.627 162.011,45.747 162.304,45.893 162.394 C 46.040 162.484,46.321 162.903,46.517 163.325 C 46.713 163.747,46.961 164.092,47.068 164.092 C 47.176 164.092,47.263 164.230,47.263 164.399 C 47.263 164.568,47.402 164.706,47.570 164.706 C 47.785 164.706,47.877 164.923,47.877 165.428 C 47.877 165.882,47.992 166.195,48.184 166.269 C 48.353 166.333,48.491 166.515,48.491 166.672 C 48.491 166.828,48.629 166.957,48.798 166.957 C 48.967 166.957,49.105 167.095,49.105 167.263 C 49.105 167.432,49.187 167.570,49.287 167.570 C 49.388 167.570,49.527 167.801,49.598 168.082 C 49.669 168.363,49.817 168.593,49.927 168.593 C 50.038 168.593,50.128 168.734,50.128 168.907 C 50.128 169.079,50.266 169.273,50.435 169.338 C 50.604 169.403,50.742 169.633,50.742 169.849 C 50.742 170.066,50.880 170.296,51.049 170.361 C 51.217 170.426,51.355 170.607,51.355 170.764 C 51.355 170.920,51.494 171.049,51.662 171.049 C 51.853 171.049,51.969 171.242,51.969 171.560 C 51.969 171.841,52.061 172.072,52.174 172.072 C 52.286 172.072,52.379 172.195,52.379 172.347 C 52.379 172.754,53.062 173.299,53.574 173.299 C 53.820 173.299,54.201 173.412,54.422 173.550 C 54.739 173.748,54.876 173.748,55.074 173.550 C 55.507 173.117,64.738 173.197,64.571 173.632 C 64.308 174.317,67.058 174.851,67.675 174.235 C 67.912 173.998,67.811 171.999,67.559 171.914 C 67.424 171.869,67.315 171.656,67.315 171.441 C 67.315 171.210,67.167 171.042,66.957 171.032 C 66.743 171.023,66.701 170.975,66.854 170.913 C 67.536 170.638,66.973 169.412,66.165 169.412 C 65.830 169.412,65.676 169.256,65.581 168.822 C 65.448 168.217,64.444 167.161,64.002 167.161 C 63.809 167.161,63.809 167.107,64.000 166.916 C 64.394 166.522,64.285 166.156,63.734 166.018 C 63.453 165.947,63.223 165.755,63.223 165.591 C 63.223 165.427,62.992 164.991,62.711 164.622 C 62.430 164.253,62.199 163.851,62.199 163.728 C 62.199 163.606,61.692 162.982,61.072 162.341 C 60.451 161.701,59.889 160.957,59.821 160.688 C 59.754 160.418,59.473 160.021,59.197 159.804 C 58.921 159.587,58.670 159.165,58.638 158.865 C 58.603 158.543,58.316 158.114,57.934 157.816 C 57.579 157.538,57.289 157.124,57.289 156.897 C 57.289 156.658,57.119 156.439,56.888 156.378 C 56.610 156.306,56.434 156.011,56.318 155.426 C 56.190 154.776,56.057 154.578,55.748 154.578 C 55.284 154.578,55.038 153.959,55.188 153.169 C 55.253 152.833,55.425 152.634,55.652 152.634 C 55.985 152.634,57.494 150.444,57.494 149.960 C 57.494 149.855,57.632 149.770,57.801 149.770 C 57.973 149.770,58.107 149.587,58.107 149.354 C 58.107 149.126,58.246 148.886,58.414 148.821 C 58.583 148.756,58.721 148.575,58.721 148.418 C 58.721 148.261,58.859 148.133,59.028 148.133 C 59.197 148.133,59.335 147.995,59.335 147.826 C 59.335 147.657,59.473 147.519,59.642 147.519 C 59.811 147.519,59.949 147.448,59.949 147.360 C 59.949 147.273,60.314 146.835,60.761 146.388 C 61.207 145.941,61.575 145.460,61.579 145.320 C 61.583 145.179,61.672 145.064,61.776 145.064 C 61.881 145.064,62.032 144.861,62.110 144.613 C 62.189 144.365,62.356 144.055,62.482 143.924 C 62.608 143.793,63.125 143.195,63.632 142.596 C 64.138 141.997,64.723 141.348,64.932 141.153 C 65.141 140.958,65.253 140.703,65.181 140.586 C 65.018 140.322,65.712 139.602,66.222 139.505 C 66.514 139.450,66.613 139.213,66.661 138.448 C 66.729 137.397,66.396 136.693,66.014 137.076 C 65.746 137.344,59.700 137.365,59.427 137.099 C 59.115 136.795,54.369 136.740,54.269 137.040 C 54.223 137.177,53.875 137.289,53.494 137.289 C 52.988 137.289,52.737 137.411,52.558 137.745 C 52.423 137.997,52.098 138.372,51.835 138.579 C 51.571 138.786,51.355 139.084,51.355 139.241 C 51.355 139.397,51.079 139.808,50.742 140.153 C 50.404 140.499,50.128 140.870,50.128 140.979 C 50.128 141.087,49.623 141.705,49.007 142.353 C 48.390 143.000,47.884 143.691,47.882 143.887 C 47.879 144.084,47.783 144.246,47.668 144.246 C 47.552 144.246,47.370 144.476,47.263 144.757 C 47.156 145.038,46.975 145.269,46.859 145.269 C 46.744 145.269,46.650 145.407,46.650 145.575 C 46.650 145.744,46.558 145.882,46.445 145.882 C 46.332 145.882,46.240 146.010,46.240 146.166 C 46.240 146.330,45.932 146.508,45.515 146.587 C 45.003 146.683,44.734 146.870,44.599 147.223 C 44.495 147.499,44.320 147.724,44.211 147.724 C 44.102 147.724,43.978 148.115,43.935 148.593 C 43.892 149.072,43.841 143.277,43.821 135.717 C 43.785 121.760,43.723 120.583,43.057 121.135 C 42.821 121.332,42.687 121.337,42.508 121.158 C 42.215 120.865,42.085 120.861,41.809 121.137 M313.862 121.535 C 313.862 121.647,313.724 121.739,313.555 121.739 C 313.364 121.739,313.248 121.932,313.248 122.251 C 313.248 122.532,313.138 122.762,313.003 122.762 C 312.812 122.762,312.812 122.817,313.003 123.008 C 313.191 123.196,313.248 128.818,313.248 147.067 L 313.248 170.881 312.825 171.223 C 312.384 171.580,312.545 172.685,313.038 172.685 C 313.154 172.685,313.248 172.824,313.248 172.992 C 313.248 173.258,314.008 173.299,318.858 173.299 C 323.707 173.299,324.548 173.345,325.059 173.638 C 326.809 174.643,326.925 174.233,326.935 167.001 C 326.942 162.141,326.993 161.142,327.257 160.766 C 327.522 160.387,327.570 160.374,327.570 160.677 C 327.570 160.874,327.708 161.089,327.877 161.154 C 328.046 161.218,328.184 161.400,328.184 161.556 C 328.184 161.713,328.266 161.841,328.367 161.841 C 328.467 161.841,328.607 162.072,328.677 162.353 C 328.748 162.634,328.896 162.864,329.006 162.864 C 329.117 162.864,329.207 163.005,329.207 163.178 C 329.207 163.350,329.337 163.541,329.496 163.602 C 329.654 163.663,329.840 163.936,329.909 164.209 C 329.977 164.482,330.124 164.706,330.234 164.706 C 330.344 164.706,330.435 164.929,330.435 165.201 C 330.435 165.964,330.646 166.343,331.070 166.343 C 331.284 166.343,331.458 166.481,331.458 166.650 C 331.458 166.818,331.596 166.957,331.765 166.957 C 331.934 166.957,332.072 167.129,332.072 167.341 C 332.072 167.552,332.210 167.839,332.379 167.980 C 332.547 168.120,332.685 168.351,332.685 168.494 C 332.685 168.637,332.824 168.807,332.992 168.872 C 333.161 168.937,333.299 169.212,333.299 169.483 C 333.299 169.754,333.437 170.090,333.606 170.230 C 333.775 170.370,333.913 170.702,333.913 170.967 C 333.913 171.312,334.060 171.487,334.425 171.578 C 334.748 171.660,334.936 171.851,334.936 172.100 C 334.936 172.317,335.074 172.546,335.242 172.611 C 335.455 172.693,335.509 172.890,335.420 173.269 C 335.315 173.714,335.341 173.765,335.564 173.555 C 335.925 173.216,336.581 173.241,337.072 173.613 C 337.584 173.999,338.302 173.996,338.692 173.606 C 339.072 173.226,344.732 173.152,345.102 173.522 C 345.262 173.682,345.363 173.682,345.462 173.522 C 345.673 173.181,349.258 173.224,349.258 173.567 C 349.258 174.160,349.774 174.596,350.095 174.275 C 350.258 174.111,350.600 173.866,350.855 173.730 L 351.317 173.483 350.902 172.899 C 350.411 172.210,350.354 171.458,350.793 171.458 C 350.962 171.458,351.100 171.631,351.100 171.842 C 351.100 172.312,351.434 172.607,352.175 172.793 C 352.484 172.871,352.737 173.016,352.737 173.117 C 352.737 173.217,353.053 173.299,353.441 173.299 C 353.828 173.299,354.202 173.391,354.271 173.504 C 354.450 173.794,355.139 173.758,355.254 173.453 C 355.321 173.274,355.440 173.315,355.651 173.589 C 355.917 173.935,356.200 173.978,358.045 173.948 C 359.615 173.923,360.246 173.991,360.574 174.220 C 361.193 174.654,365.579 174.658,366.150 174.226 C 366.434 174.012,367.110 173.924,368.517 173.920 C 370.013 173.915,370.548 173.839,370.742 173.606 C 370.885 173.433,371.331 173.299,371.765 173.299 C 372.198 173.299,372.644 173.165,372.788 172.992 C 372.928 172.824,373.261 172.685,373.529 172.685 C 373.796 172.685,374.015 172.593,374.015 172.481 C 374.015 172.368,374.239 172.276,374.512 172.276 C 374.786 172.276,375.147 172.138,375.316 171.969 C 375.485 171.801,375.760 171.662,375.927 171.662 C 376.358 171.662,377.903 170.173,377.903 169.758 C 377.903 169.568,377.995 169.412,378.107 169.412 C 378.421 169.412,379.130 168.632,379.130 168.286 C 379.130 168.118,379.213 167.980,379.313 167.980 C 379.413 167.980,379.553 167.749,379.624 167.468 C 379.694 167.187,379.842 166.957,379.953 166.957 C 380.063 166.957,380.153 166.644,380.153 166.262 C 380.153 165.834,380.271 165.523,380.460 165.450 C 380.686 165.364,380.767 165.006,380.767 164.096 C 380.767 163.415,380.880 162.678,381.018 162.458 C 381.216 162.141,381.216 162.003,381.018 161.806 C 380.869 161.657,380.767 160.987,380.767 160.157 C 380.767 159.104,380.692 158.731,380.460 158.642 C 380.292 158.577,380.153 158.297,380.153 158.020 C 380.153 157.742,380.015 157.377,379.847 157.209 C 379.678 157.040,379.540 156.632,379.540 156.303 C 379.540 155.800,379.457 155.703,379.028 155.703 C 378.710 155.703,378.517 155.587,378.517 155.396 C 378.517 155.228,378.379 155.090,378.210 155.090 C 378.041 155.090,377.903 154.962,377.903 154.806 C 377.903 154.650,377.651 154.358,377.344 154.156 C 377.036 153.955,376.553 153.576,376.271 153.314 C 375.883 152.954,375.521 152.839,374.778 152.839 C 373.857 152.839,373.810 152.813,374.017 152.427 C 374.291 151.915,373.754 151.625,373.188 151.979 C 372.906 152.155,372.799 152.139,372.710 151.909 C 372.636 151.717,372.304 151.611,371.771 151.611 C 371.174 151.611,370.946 151.526,370.946 151.304 C 370.946 151.084,370.721 150.997,370.150 150.997 C 369.630 150.997,369.312 150.891,369.235 150.691 C 369.162 150.498,368.849 150.384,368.395 150.384 C 367.998 150.384,367.673 150.292,367.673 150.179 C 367.673 150.066,367.500 149.974,367.288 149.974 C 367.077 149.974,366.790 149.836,366.650 149.668 C 366.510 149.499,366.130 149.361,365.806 149.361 C 365.315 149.361,365.217 149.276,365.217 148.849 C 365.217 148.471,365.109 148.338,364.802 148.338 C 364.573 148.338,364.357 148.223,364.321 148.082 C 364.286 147.941,364.158 147.527,364.039 147.162 C 363.844 146.568,363.874 146.456,364.315 146.109 C 364.586 145.896,364.808 145.619,364.808 145.495 C 364.808 145.351,365.326 145.269,366.226 145.269 C 367.238 145.269,367.735 145.177,367.963 144.949 C 368.253 144.659,368.325 144.659,368.739 144.949 C 369.068 145.179,369.692 145.269,370.970 145.269 C 372.358 145.269,372.770 145.335,372.862 145.575 C 372.926 145.744,373.120 145.882,373.293 145.882 C 373.465 145.882,373.606 145.974,373.606 146.087 C 373.606 146.199,373.882 146.292,374.220 146.292 C 374.558 146.292,374.834 146.193,374.834 146.072 C 374.834 145.952,374.978 145.998,375.155 146.175 C 375.332 146.351,375.649 146.496,375.859 146.496 C 376.070 146.496,376.299 146.588,376.368 146.701 C 376.568 147.025,377.903 146.955,377.903 146.620 C 377.903 146.464,378.041 146.282,378.210 146.218 C 378.457 146.123,378.517 145.659,378.517 143.831 C 378.517 142.583,378.615 140.928,378.735 140.154 C 378.999 138.453,378.799 137.903,377.918 137.903 C 377.586 137.903,377.282 137.770,377.215 137.596 C 377.131 137.376,376.788 137.289,376.011 137.289 C 375.414 137.289,374.743 137.163,374.521 137.010 C 373.741 136.470,360.976 136.445,360.438 136.982 C 360.270 137.151,359.800 137.289,359.394 137.289 C 358.928 137.289,358.614 137.402,358.539 137.596 C 358.472 137.771,358.167 137.903,357.830 137.903 C 357.484 137.903,357.238 138.012,357.238 138.166 C 357.238 138.311,357.062 138.443,356.847 138.459 C 356.074 138.517,353.964 140.050,353.964 140.554 C 353.964 140.671,353.826 140.767,353.657 140.767 C 353.488 140.767,353.350 140.905,353.350 141.074 C 353.350 141.243,353.212 141.381,353.043 141.381 C 352.875 141.381,352.737 141.509,352.737 141.666 C 352.737 141.823,352.598 142.004,352.430 142.069 C 352.261 142.134,352.123 142.364,352.123 142.580 C 352.123 142.797,351.985 143.027,351.816 143.092 C 351.647 143.157,351.509 143.443,351.509 143.728 C 351.509 144.012,351.417 144.246,351.304 144.246 C 351.192 144.246,351.100 144.649,351.100 145.141 C 351.100 145.688,350.980 146.136,350.793 146.292 C 350.556 146.488,350.486 147.033,350.486 148.676 C 350.486 150.380,350.547 150.829,350.793 150.923 C 350.993 151.000,351.100 151.318,351.100 151.838 C 351.100 152.276,351.182 152.634,351.282 152.634 C 351.382 152.634,351.527 152.883,351.603 153.187 C 351.679 153.490,351.966 153.946,352.239 154.200 C 352.513 154.453,352.737 154.757,352.737 154.875 C 352.737 154.993,352.832 155.090,352.948 155.090 C 353.064 155.090,353.215 155.251,353.285 155.448 C 353.497 156.048,354.405 156.726,354.997 156.726 C 355.306 156.726,355.610 156.864,355.675 157.033 C 355.740 157.202,356.016 157.340,356.289 157.340 C 356.562 157.340,356.838 157.478,356.903 157.647 C 356.967 157.816,357.202 157.954,357.424 157.954 C 357.646 157.954,357.884 158.046,357.954 158.159 C 358.024 158.271,358.443 158.363,358.887 158.363 C 359.467 158.363,359.693 158.449,359.693 158.670 C 359.693 158.885,359.910 158.977,360.416 158.977 C 360.869 158.977,361.182 159.091,361.256 159.284 C 361.327 159.470,361.637 159.591,362.043 159.591 C 362.411 159.591,362.827 159.729,362.967 159.898 C 363.107 160.066,363.453 160.205,363.735 160.205 C 364.018 160.205,364.421 160.404,364.632 160.647 C 364.843 160.890,365.221 161.191,365.472 161.316 C 365.775 161.468,365.970 161.801,366.052 162.309 C 366.201 163.223,366.369 163.432,366.694 163.107 C 366.827 162.973,367.240 162.864,367.611 162.864 C 368.495 162.864,368.503 163.393,367.631 164.092 C 367.280 164.373,366.838 164.751,366.648 164.930 C 366.445 165.123,365.775 165.305,365.020 165.373 C 364.315 165.437,363.638 165.590,363.516 165.712 C 363.160 166.068,362.537 165.972,361.370 165.381 C 360.466 164.924,360.212 164.871,359.887 165.075 C 359.362 165.402,358.657 165.374,358.171 165.006 C 357.952 164.841,357.520 164.706,357.211 164.706 C 356.901 164.706,356.591 164.614,356.522 164.501 C 356.452 164.389,356.009 164.286,355.538 164.273 C 355.066 164.260,354.841 164.207,355.038 164.156 C 355.815 163.953,355.506 162.660,354.680 162.660 C 354.168 162.660,353.964 162.751,353.964 162.979 C 353.964 163.154,353.872 163.241,353.760 163.171 C 353.647 163.102,353.555 162.866,353.555 162.648 C 353.555 162.320,353.410 162.251,352.720 162.251 C 351.794 162.251,351.686 162.649,352.547 162.890 C 352.912 162.992,352.787 163.034,352.072 163.049 C 351.532 163.060,351.100 163.166,351.100 163.287 C 351.100 163.407,350.865 163.813,350.578 164.190 C 350.280 164.580,350.142 164.927,350.257 164.998 C 350.367 165.066,350.515 165.028,350.586 164.914 C 350.979 164.278,351.099 164.972,351.085 167.826 C 351.077 169.618,351.001 170.772,350.906 170.537 C 350.816 170.312,350.788 169.828,350.845 169.462 C 350.928 168.932,350.838 168.685,350.403 168.251 L 349.858 167.705 349.260 168.405 C 348.662 169.104,348.661 169.104,348.653 168.581 C 348.647 168.231,348.424 167.896,347.980 167.573 C 347.614 167.307,347.241 166.967,347.151 166.818 C 347.061 166.669,346.844 166.547,346.669 166.547 C 346.464 166.547,346.394 166.433,346.472 166.229 C 346.697 165.642,346.073 164.516,345.592 164.642 C 345.159 164.755,345.076 164.595,345.161 163.807 C 345.205 163.394,344.263 162.455,343.804 162.455 C 343.653 162.455,343.529 162.327,343.529 162.170 C 343.529 162.013,343.391 161.832,343.223 161.767 C 343.054 161.703,342.916 161.463,342.916 161.234 C 342.916 161.001,342.781 160.818,342.609 160.818 C 342.418 160.818,342.302 160.625,342.302 160.307 C 342.302 160.026,342.210 159.795,342.097 159.795 C 341.985 159.795,341.893 159.619,341.893 159.403 C 341.893 159.188,341.477 158.566,340.970 158.022 C 340.463 157.478,339.998 156.877,339.937 156.686 C 339.876 156.494,339.655 156.284,339.447 156.218 C 339.239 156.152,339.012 155.871,338.942 155.594 C 338.873 155.316,338.725 155.090,338.615 155.090 C 338.505 155.090,338.414 154.951,338.414 154.783 C 338.414 154.614,338.276 154.476,338.107 154.476 C 337.354 154.476,338.361 152.048,339.282 151.645 C 339.367 151.608,339.437 151.447,339.437 151.287 C 339.437 151.128,339.575 150.997,339.744 150.997 C 339.913 150.997,340.051 150.909,340.051 150.800 C 340.051 150.691,340.327 150.320,340.665 149.974 C 341.003 149.629,341.279 149.253,341.279 149.139 C 341.279 149.025,341.509 148.719,341.790 148.458 C 342.087 148.183,342.302 147.757,342.302 147.445 C 342.302 147.148,342.408 146.905,342.538 146.905 C 342.752 146.905,343.401 146.278,344.706 144.808 C 344.959 144.523,345.167 144.165,345.168 144.012 C 345.168 143.859,345.444 143.577,345.781 143.385 C 346.213 143.140,346.394 142.881,346.394 142.509 C 346.394 142.219,346.532 141.929,346.701 141.864 C 346.870 141.799,347.008 141.625,347.008 141.476 C 347.008 141.327,347.215 141.176,347.468 141.140 C 347.814 141.090,347.960 140.897,348.055 140.358 C 348.124 139.964,348.194 139.716,348.208 139.807 C 348.223 139.897,348.557 139.621,348.950 139.193 C 349.963 138.090,349.928 136.088,348.913 137.102 C 348.753 137.262,348.652 137.262,348.553 137.102 C 348.381 136.823,347.212 136.807,347.212 137.084 C 347.212 137.500,345.816 137.314,345.678 136.880 C 345.593 136.613,345.368 136.471,345.031 136.471 C 344.686 136.471,344.478 136.607,344.407 136.880 C 344.288 137.335,340.423 137.521,340.153 137.084 C 340.084 136.972,339.347 136.880,338.517 136.880 C 337.686 136.880,336.949 136.972,336.880 137.084 C 336.810 137.197,336.483 137.289,336.152 137.289 C 335.821 137.289,335.550 137.373,335.550 137.476 C 335.550 137.580,335.182 138.059,334.731 138.542 C 334.281 139.024,333.913 139.584,333.913 139.786 C 333.913 139.988,333.775 140.153,333.606 140.153 C 333.437 140.153,333.299 140.282,333.299 140.438 C 333.299 140.595,333.161 140.776,332.992 140.841 C 332.824 140.906,332.685 141.092,332.685 141.255 C 332.685 141.529,332.285 142.088,331.407 143.039 C 331.210 143.253,331.049 143.611,331.049 143.836 C 331.049 144.064,330.912 144.246,330.742 144.246 C 330.573 144.246,330.435 144.328,330.435 144.428 C 330.435 144.528,330.205 144.668,329.925 144.738 C 329.522 144.840,329.388 145.036,329.285 145.681 C 329.207 146.172,329.043 146.496,328.874 146.496 C 328.720 146.496,328.593 146.634,328.593 146.803 C 328.593 146.972,328.501 147.110,328.389 147.110 C 328.276 147.110,328.184 147.248,328.184 147.417 C 328.184 147.586,328.046 147.724,327.877 147.724 C 327.708 147.724,327.570 147.862,327.570 148.031 C 327.570 148.199,327.448 148.338,327.298 148.338 C 326.950 148.338,326.524 147.011,326.787 146.747 C 326.903 146.631,326.954 141.766,326.916 134.403 L 326.854 122.250 326.394 121.790 C 325.887 121.283,313.862 121.038,313.862 121.535 M158.863 122.030 C 158.206 122.510,158.254 131.954,158.917 132.571 C 159.392 133.014,160.000 133.135,160.000 132.788 C 160.000 132.493,170.161 132.510,170.343 132.806 C 170.442 132.966,170.543 132.966,170.703 132.806 C 170.826 132.683,171.178 132.583,171.487 132.583 C 172.325 132.583,172.361 132.394,172.299 128.360 L 172.241 124.637 172.719 124.569 C 173.731 124.426,173.385 123.009,172.174 122.335 L 171.151 121.766 165.205 121.753 C 160.377 121.742,159.185 121.794,158.863 122.030 M44.081 122.411 C 43.815 123.102,44.082 124.905,44.460 124.977 C 44.789 125.039,44.821 124.902,44.767 123.665 C 44.708 122.341,44.355 121.696,44.081 122.411 M42.617 122.609 C 42.931 122.843,42.961 124.032,42.976 136.927 C 42.988 146.475,43.062 151.032,43.207 151.122 C 43.446 151.269,44.568 150.102,45.392 148.849 C 45.688 148.399,45.990 147.985,46.064 147.928 C 46.139 147.872,46.635 147.233,47.169 146.509 C 48.151 145.173,48.390 144.868,48.849 144.355 C 48.990 144.198,49.105 144.009,49.105 143.935 C 49.105 143.861,49.519 143.326,50.026 142.748 C 50.532 142.169,50.946 141.620,50.946 141.529 C 50.946 141.438,51.040 141.253,51.155 141.117 C 51.761 140.398,52.242 139.797,52.840 139.013 C 53.691 137.897,53.656 137.903,59.847 137.903 C 65.876 137.903,65.965 137.929,64.835 139.381 C 64.460 139.862,64.037 140.329,63.893 140.419 C 63.749 140.509,63.632 140.709,63.632 140.863 C 63.632 141.017,63.563 141.173,63.478 141.211 C 63.274 141.301,61.381 143.561,61.381 143.714 C 61.381 143.838,60.932 144.397,59.795 145.688 C 59.430 146.104,59.130 146.540,59.130 146.657 C 59.130 146.775,59.060 146.902,58.973 146.939 C 58.887 146.977,58.450 147.468,58.002 148.031 C 57.553 148.593,57.118 149.084,57.033 149.122 C 56.949 149.159,56.880 149.321,56.880 149.480 C 56.880 149.639,56.804 149.770,56.711 149.770 C 56.618 149.770,56.181 150.274,55.739 150.891 C 55.297 151.507,54.867 152.014,54.783 152.016 C 54.698 152.018,54.629 152.125,54.629 152.254 C 54.629 152.382,54.473 152.601,54.281 152.741 C 53.729 153.145,53.835 154.299,54.488 155.003 C 54.793 155.332,55.094 155.762,55.157 155.959 C 55.219 156.156,55.356 156.317,55.461 156.317 C 55.566 156.317,55.652 156.420,55.652 156.546 C 55.652 156.672,55.905 157.071,56.215 157.434 C 56.524 157.797,56.916 158.304,57.084 158.561 C 57.253 158.817,57.483 159.131,57.596 159.258 C 57.778 159.463,59.107 161.388,59.642 162.222 C 59.754 162.397,59.974 162.679,60.131 162.848 C 60.287 163.017,60.686 163.596,61.018 164.135 C 61.349 164.674,61.694 165.115,61.784 165.115 C 61.874 165.115,62.001 165.276,62.067 165.473 C 62.239 165.985,62.627 166.546,63.274 167.220 C 63.583 167.543,63.836 167.937,63.836 168.098 C 63.836 168.258,63.928 168.389,64.041 168.389 C 64.153 168.389,64.246 168.475,64.246 168.581 C 64.246 168.686,64.522 169.075,64.859 169.445 C 65.197 169.814,65.473 170.234,65.473 170.378 C 65.473 170.522,65.565 170.639,65.678 170.639 C 65.790 170.639,65.882 170.773,65.882 170.936 C 65.882 171.099,66.004 171.306,66.154 171.396 C 66.578 171.652,66.705 172.223,66.395 172.480 C 66.195 172.646,64.358 172.694,59.979 172.648 L 53.843 172.583 53.308 171.969 C 52.873 171.472,51.176 168.852,49.861 166.650 C 49.726 166.425,49.570 166.194,49.514 166.138 C 49.353 165.977,48.082 164.088,48.082 164.010 C 48.082 163.972,47.299 162.768,46.343 161.336 C 45.386 159.904,44.604 158.649,44.604 158.547 C 44.604 158.446,44.517 158.363,44.410 158.363 C 44.304 158.363,44.097 158.117,43.950 157.816 C 43.160 156.196,42.980 157.775,42.966 166.440 C 42.959 170.051,42.879 172.242,42.747 172.374 C 42.448 172.673,31.852 172.774,31.308 172.483 C 30.895 172.262,30.894 172.181,30.945 147.462 L 30.997 122.664 31.611 122.533 C 32.838 122.270,42.251 122.335,42.617 122.609 M149.040 122.552 L 149.565 122.752 149.565 147.507 C 149.565 171.296,149.551 172.270,149.190 172.462 C 148.779 172.683,139.446 172.772,138.616 172.564 C 138.191 172.457,138.107 172.314,138.106 171.691 C 138.103 170.274,137.843 168.184,137.669 168.184 C 137.573 168.184,136.763 168.921,135.869 169.821 C 134.975 170.721,134.111 171.458,133.950 171.458 C 133.788 171.458,133.542 171.596,133.402 171.765 C 133.261 171.934,133.013 172.072,132.850 172.072 C 132.687 172.072,132.416 172.210,132.247 172.379 C 132.078 172.547,131.678 172.685,131.358 172.685 C 131.038 172.685,130.738 172.799,130.691 172.939 C 130.575 173.286,122.609 173.304,122.395 172.958 C 122.315 172.829,121.904 172.658,121.481 172.579 C 121.058 172.499,120.661 172.353,120.599 172.253 C 120.538 172.153,120.272 172.072,120.009 172.072 C 119.746 172.072,119.232 171.818,118.866 171.509 C 117.190 170.089,115.601 168.516,115.601 168.277 C 115.601 168.132,115.521 167.983,115.422 167.945 C 115.196 167.859,113.964 165.552,113.964 165.214 C 113.964 165.074,113.826 164.846,113.657 164.706 C 113.488 164.566,113.350 164.134,113.350 163.747 C 113.350 163.359,113.246 162.848,113.119 162.610 C 112.992 162.373,112.814 161.665,112.724 161.038 C 112.633 160.411,112.454 159.437,112.326 158.875 C 112.056 157.693,112.237 150.813,112.547 150.496 C 112.651 150.389,112.737 149.877,112.737 149.359 C 112.737 148.840,112.872 148.237,113.037 148.019 C 113.202 147.800,113.340 147.287,113.344 146.879 C 113.347 146.471,113.488 146.022,113.657 145.882 C 113.826 145.742,113.964 145.420,113.964 145.166 C 113.964 144.912,114.102 144.590,114.271 144.450 C 114.440 144.310,114.578 144.110,114.578 144.006 C 114.578 142.831,118.393 139.000,119.949 138.612 C 120.258 138.535,120.512 138.390,120.512 138.290 C 120.512 138.190,120.673 138.107,120.870 138.106 C 121.066 138.105,121.504 137.957,121.841 137.775 C 122.765 137.279,130.158 137.243,131.166 137.729 C 131.552 137.915,132.235 138.237,132.685 138.445 C 133.136 138.653,133.535 138.893,133.572 138.977 C 133.610 139.061,133.748 139.131,133.879 139.131 C 134.010 139.131,134.807 139.768,135.650 140.547 C 136.668 141.487,137.234 141.882,137.335 141.723 C 137.419 141.591,137.489 137.231,137.490 132.035 L 137.494 122.586 137.954 122.497 C 138.914 122.312,148.535 122.360,149.040 122.552 M193.015 122.563 C 193.074 122.622,193.151 126.965,193.185 132.214 C 193.220 137.462,193.320 141.828,193.408 141.916 C 193.495 142.003,194.234 141.413,195.049 140.603 C 195.864 139.793,196.644 139.130,196.782 139.130 C 196.920 139.130,197.033 139.046,197.033 138.942 C 197.033 138.838,197.309 138.693,197.647 138.619 C 197.985 138.545,198.261 138.399,198.261 138.296 C 198.261 138.192,198.425 138.107,198.625 138.107 C 198.825 138.107,199.170 137.985,199.392 137.836 C 199.979 137.441,203.873 137.068,205.115 137.288 C 205.678 137.388,206.662 137.475,207.303 137.481 C 207.943 137.488,208.519 137.579,208.584 137.682 C 208.648 137.786,208.995 137.936,209.356 138.015 C 210.054 138.169,210.264 138.269,211.867 139.212 C 213.004 139.881,215.652 142.485,215.652 142.935 C 215.652 143.093,215.744 143.223,215.857 143.223 C 215.969 143.223,216.061 143.400,216.061 143.617 C 216.061 143.834,216.184 144.134,216.334 144.284 C 216.484 144.434,216.669 144.809,216.747 145.117 C 216.824 145.425,216.978 145.678,217.088 145.678 C 217.199 145.678,217.289 145.982,217.289 146.355 C 217.289 146.727,217.424 147.210,217.589 147.429 C 217.755 147.647,217.893 148.249,217.896 148.767 C 217.900 149.284,218.050 150.002,218.230 150.362 C 218.651 151.207,218.589 159.805,218.159 160.235 C 218.018 160.376,217.903 160.844,217.903 161.275 C 217.903 161.706,217.765 162.390,217.596 162.794 C 217.427 163.198,217.289 163.829,217.289 164.197 C 217.289 164.604,217.168 164.913,216.982 164.984 C 216.813 165.049,216.675 165.236,216.675 165.399 C 216.675 165.745,216.030 167.027,215.806 167.127 C 215.721 167.165,215.652 167.287,215.652 167.400 C 215.652 168.250,212.374 171.305,210.742 171.977 C 210.573 172.047,210.190 172.235,209.892 172.395 C 209.593 172.555,209.174 172.685,208.961 172.685 C 208.747 172.685,208.458 172.800,208.317 172.941 C 207.953 173.305,200.436 173.305,200.072 172.941 C 199.931 172.801,199.622 172.685,199.384 172.685 C 199.147 172.685,198.774 172.550,198.556 172.385 C 198.337 172.220,197.951 172.082,197.698 172.078 C 197.445 172.075,197.238 171.992,197.238 171.894 C 197.238 171.797,196.889 171.486,196.463 171.204 C 195.568 170.612,194.238 169.354,193.653 168.546 C 193.038 167.698,192.791 168.085,192.642 170.128 C 192.555 171.325,192.403 172.077,192.206 172.276 C 191.823 172.664,182.565 172.815,181.637 172.449 L 181.074 172.227 181.074 147.526 L 181.074 122.825 181.535 122.603 C 182.001 122.380,192.794 122.342,193.015 122.563 M325.517 122.749 C 325.657 123.010,325.729 127.894,325.729 137.173 C 325.729 151.066,325.733 151.202,326.138 151.202 C 326.363 151.202,326.549 151.133,326.551 151.049 C 326.552 150.964,326.919 150.481,327.366 149.974 C 327.812 149.468,328.179 148.991,328.181 148.915 C 328.183 148.839,328.299 148.653,328.440 148.503 C 328.581 148.353,329.154 147.633,329.714 146.903 C 330.274 146.173,330.803 145.545,330.890 145.507 C 330.977 145.470,331.049 145.332,331.050 145.200 C 331.050 145.069,331.326 144.667,331.663 144.308 C 332.000 143.948,332.276 143.593,332.276 143.519 C 332.276 143.392,333.454 141.809,333.715 141.586 C 333.780 141.529,334.405 140.728,335.104 139.804 C 336.662 137.744,336.246 137.843,342.887 137.935 C 348.430 138.011,348.755 138.078,347.924 138.974 C 347.645 139.275,347.417 139.601,347.417 139.697 C 347.417 139.793,347.141 140.137,346.803 140.460 C 346.465 140.784,346.189 141.128,346.189 141.225 C 346.189 141.321,345.979 141.603,345.722 141.851 C 345.145 142.407,343.939 143.949,343.939 144.131 C 343.939 144.205,343.708 144.478,343.427 144.739 C 343.146 145.000,342.916 145.315,342.916 145.438 C 342.916 145.562,342.653 145.932,342.332 146.260 C 342.012 146.588,341.301 147.443,340.752 148.160 C 339.721 149.507,339.481 149.814,339.127 150.237 C 339.013 150.374,338.602 150.900,338.212 151.407 C 337.823 151.913,337.387 152.401,337.243 152.491 C 337.100 152.581,336.982 152.788,336.982 152.951 C 336.982 153.115,336.890 153.248,336.777 153.248 C 336.665 153.248,336.573 153.478,336.573 153.760 C 336.573 154.041,336.644 154.271,336.731 154.271 C 336.818 154.271,337.062 154.592,337.272 154.983 C 337.483 155.375,337.916 155.950,338.234 156.262 C 338.552 156.574,338.815 156.922,338.818 157.035 C 338.821 157.149,339.035 157.471,339.294 157.751 C 339.553 158.032,339.945 158.574,340.164 158.958 C 340.383 159.341,340.816 159.937,341.125 160.282 C 341.435 160.627,341.688 160.985,341.688 161.077 C 341.688 161.231,341.792 161.378,342.412 162.104 C 342.528 162.241,342.835 162.698,343.093 163.120 C 343.352 163.542,343.637 163.887,343.727 163.887 C 343.817 163.887,343.945 164.049,344.011 164.246 C 344.165 164.705,344.535 165.265,345.117 165.923 C 345.372 166.210,345.631 166.606,345.694 166.803 C 345.756 167.000,345.893 167.161,345.998 167.161 C 346.103 167.161,346.189 167.248,346.189 167.355 C 346.189 167.462,346.424 167.802,346.710 168.111 C 346.997 168.420,347.365 168.955,347.529 169.298 C 347.693 169.642,348.103 170.218,348.440 170.577 C 348.778 170.937,349.054 171.317,349.054 171.422 C 349.054 171.527,349.200 171.734,349.379 171.882 C 350.189 172.555,349.220 172.686,343.439 172.683 C 336.702 172.680,336.603 172.667,335.951 171.693 C 335.676 171.283,335.404 170.900,335.347 170.844 C 335.142 170.642,334.717 169.916,334.599 169.565 C 334.533 169.368,334.419 169.207,334.345 169.207 C 334.272 169.207,333.985 168.793,333.708 168.286 C 333.432 167.780,333.145 167.366,333.072 167.366 C 332.998 167.366,332.884 167.205,332.818 167.008 C 332.655 166.523,332.217 165.855,331.454 164.930 C 331.231 164.660,331.049 164.322,331.049 164.180 C 331.049 164.038,330.980 163.891,330.895 163.853 C 330.811 163.816,330.467 163.371,330.131 162.864 C 329.213 161.480,329.021 161.159,328.880 160.767 C 328.808 160.570,328.675 160.409,328.583 160.409 C 328.491 160.409,328.353 160.209,328.275 159.964 C 328.197 159.719,327.914 159.282,327.645 158.992 C 327.376 158.702,327.105 158.304,327.043 158.107 C 326.980 157.910,326.843 157.749,326.738 157.749 C 326.633 157.749,326.547 157.611,326.547 157.442 C 326.547 157.272,326.365 157.136,326.138 157.136 C 325.737 157.136,325.729 157.272,325.729 164.386 C 325.729 168.601,325.645 171.855,325.529 172.161 L 325.330 172.685 319.841 172.685 C 315.845 172.685,314.286 172.619,314.107 172.440 C 313.652 171.984,313.763 122.840,314.220 122.574 C 314.972 122.136,325.274 122.295,325.517 122.749 M171.458 127.268 C 171.458 132.455,172.087 131.969,165.359 131.969 C 158.624 131.969,159.301 132.475,159.221 127.382 L 159.157 123.375 159.694 123.171 C 159.995 123.057,162.293 122.967,164.912 122.967 C 167.496 122.967,169.644 122.884,169.707 122.781 C 169.770 122.679,170.190 122.773,170.640 122.990 L 171.458 123.386 171.458 127.268 M312.347 123.731 C 312.078 124.001,312.249 124.399,312.634 124.399 C 312.859 124.399,313.043 124.271,313.043 124.114 C 313.043 123.805,312.546 123.532,312.347 123.731 M170.309 135.537 C 170.148 135.957,170.375 136.532,170.638 136.369 C 170.751 136.299,170.844 136.069,170.844 135.857 C 170.844 135.353,170.466 135.127,170.309 135.537 M171.364 135.433 C 171.224 135.660,171.547 135.904,171.736 135.715 C 171.931 135.520,171.894 135.243,171.674 135.243 C 171.569 135.243,171.429 135.329,171.364 135.433 M84.648 136.353 C 84.405 136.596,83.895 136.675,82.566 136.675 C 81.190 136.675,80.780 136.742,80.688 136.982 C 80.611 137.183,80.292 137.289,79.767 137.289 C 79.242 137.289,78.923 137.395,78.846 137.596 C 78.770 137.794,78.454 137.903,77.954 137.903 C 77.454 137.903,77.138 138.012,77.062 138.210 C 76.997 138.379,76.817 138.517,76.662 138.517 C 76.350 138.517,75.046 139.120,74.885 139.339 C 74.829 139.416,74.506 139.571,74.169 139.685 C 73.714 139.838,73.568 140.005,73.604 140.329 C 73.637 140.627,73.538 140.768,73.297 140.771 C 72.857 140.775,72.020 141.629,72.020 142.075 C 72.020 142.256,71.882 142.404,71.714 142.404 C 71.545 142.404,71.407 142.542,71.407 142.711 C 71.407 142.880,71.269 143.018,71.100 143.018 C 70.931 143.018,70.793 143.146,70.793 143.303 C 70.793 143.460,70.655 143.641,70.486 143.706 C 70.317 143.770,70.179 143.999,70.179 144.214 C 70.179 144.429,70.041 144.719,69.872 144.859 C 69.703 144.999,69.565 145.287,69.565 145.498 C 69.565 145.709,69.473 145.882,69.361 145.882 C 69.248 145.882,69.156 146.149,69.156 146.474 C 69.156 146.812,69.024 147.117,68.849 147.184 C 68.634 147.267,68.542 147.602,68.542 148.309 C 68.542 149.016,68.451 149.352,68.235 149.435 C 68.006 149.523,67.926 149.901,67.919 150.940 C 67.914 151.703,67.778 152.696,67.616 153.146 C 67.212 154.266,67.216 156.799,67.621 157.136 C 67.854 157.329,67.928 157.853,67.928 159.309 C 67.928 160.878,67.984 161.228,68.235 161.228 C 68.457 161.228,68.542 161.456,68.542 162.052 C 68.542 162.597,68.647 162.917,68.849 162.995 C 69.021 163.061,69.156 163.365,69.156 163.686 C 69.156 164.312,70.114 166.346,70.532 166.609 C 70.675 166.699,70.793 166.909,70.793 167.075 C 70.793 167.242,70.931 167.432,71.100 167.496 C 71.269 167.561,71.407 167.742,71.407 167.899 C 71.407 168.056,71.545 168.184,71.714 168.184 C 71.882 168.184,72.020 168.282,72.020 168.402 C 72.020 168.748,74.206 171.049,74.536 171.049 C 74.631 171.049,74.848 171.187,75.016 171.355 C 75.185 171.524,75.593 171.662,75.923 171.662 C 76.252 171.662,76.522 171.767,76.522 171.896 C 76.522 172.284,77.199 172.672,77.888 172.679 C 78.246 172.682,78.677 172.824,78.845 172.992 C 79.029 173.176,79.530 173.299,80.094 173.299 C 80.742 173.299,81.073 173.395,81.154 173.606 C 81.255 173.870,82.149 173.913,87.475 173.913 C 92.717 173.913,93.727 173.865,93.986 173.606 C 94.155 173.437,94.645 173.296,95.075 173.293 C 95.505 173.289,96.036 173.151,96.254 172.986 C 96.472 172.821,96.810 172.685,97.005 172.685 C 97.395 172.685,98.682 172.058,98.789 171.816 C 98.827 171.731,99.077 171.662,99.345 171.662 C 99.613 171.662,100.147 171.386,100.531 171.049 C 100.916 170.711,101.333 170.435,101.459 170.435 C 101.585 170.435,101.688 170.297,101.688 170.128 C 101.688 169.959,101.772 169.821,101.874 169.821 C 102.316 169.821,103.939 167.978,103.939 167.476 C 103.939 167.190,104.031 166.957,104.143 166.957 C 104.400 166.957,105.166 166.203,105.166 165.950 C 105.166 165.847,105.320 165.455,105.508 165.081 C 106.136 163.827,106.189 163.690,106.191 163.328 C 106.191 163.129,106.329 162.703,106.497 162.381 C 106.666 162.058,106.803 161.401,106.803 160.919 C 106.803 160.330,106.903 160.005,107.110 159.926 C 107.370 159.826,107.417 159.118,107.417 155.294 C 107.417 151.470,107.370 150.762,107.110 150.662 C 106.885 150.576,106.803 150.222,106.803 149.344 C 106.803 148.170,106.684 147.809,105.349 144.933 C 105.132 144.467,104.819 143.972,104.652 143.834 C 104.485 143.695,104.348 143.438,104.348 143.262 C 104.348 143.087,103.816 142.422,103.166 141.786 C 102.515 141.150,101.823 140.384,101.626 140.084 C 101.377 139.704,101.092 139.540,100.682 139.540 C 100.349 139.540,100.044 139.407,99.977 139.233 C 99.912 139.064,99.729 138.926,99.569 138.926 C 99.410 138.926,99.022 138.792,98.708 138.629 C 98.394 138.466,98.071 138.374,97.990 138.424 C 97.909 138.473,97.791 138.377,97.726 138.209 C 97.662 138.040,97.433 137.903,97.218 137.903 C 97.003 137.903,96.713 137.765,96.573 137.596 C 96.410 137.399,95.957 137.289,95.314 137.289 C 94.610 137.289,94.274 137.197,94.192 136.982 C 94.100 136.743,93.696 136.675,92.374 136.675 C 91.195 136.675,90.647 136.597,90.589 136.419 C 90.448 135.995,85.066 135.935,84.648 136.353 M239.847 136.196 C 239.593 136.250,239.386 136.380,239.386 136.485 C 239.386 136.590,238.742 136.675,237.954 136.675 C 236.817 136.675,236.522 136.739,236.522 136.982 C 236.522 137.209,236.285 137.289,235.616 137.289 C 235.083 137.289,234.583 137.416,234.403 137.596 C 234.234 137.765,233.898 137.903,233.657 137.903 C 233.416 137.903,233.081 138.041,232.912 138.210 C 232.743 138.379,232.427 138.517,232.210 138.517 C 231.993 138.517,231.816 138.609,231.816 138.721 C 231.816 138.834,231.655 138.929,231.458 138.933 C 231.036 138.941,230.179 139.610,230.179 139.930 C 230.179 140.053,229.981 140.153,229.739 140.153 C 229.301 140.153,227.315 142.018,227.315 142.429 C 227.315 142.543,227.038 142.868,226.701 143.152 C 226.363 143.436,226.087 143.790,226.087 143.940 C 226.087 144.089,226.014 144.242,225.924 144.280 C 225.631 144.403,224.859 146.088,224.859 146.605 C 224.859 146.883,224.767 147.110,224.655 147.110 C 224.542 147.110,224.450 147.422,224.450 147.804 C 224.450 148.233,224.333 148.544,224.143 148.616 C 223.911 148.705,223.836 149.080,223.836 150.151 C 223.836 151.221,223.761 151.596,223.529 151.685 C 223.273 151.784,223.223 152.380,223.223 155.294 C 223.223 158.209,223.273 158.805,223.529 158.903 C 223.761 158.992,223.836 159.366,223.836 160.431 C 223.836 161.548,223.900 161.841,224.143 161.841 C 224.365 161.841,224.450 162.069,224.450 162.660 C 224.450 163.110,224.542 163.478,224.655 163.478 C 224.767 163.478,224.859 163.697,224.859 163.965 C 224.859 164.232,224.997 164.566,225.166 164.706 C 225.335 164.846,225.473 165.173,225.473 165.432 C 225.473 165.692,225.611 166.042,225.780 166.211 C 225.949 166.380,226.087 166.617,226.087 166.737 C 226.087 166.858,226.225 166.957,226.394 166.957 C 226.563 166.957,226.701 167.095,226.701 167.263 C 226.701 167.432,226.816 167.571,226.957 167.573 C 227.097 167.574,227.388 167.942,227.603 168.391 C 227.818 168.840,228.077 169.207,228.179 169.207 C 228.281 169.207,228.596 169.483,228.881 169.821 C 229.165 170.159,229.573 170.435,229.788 170.435 C 230.003 170.435,230.179 170.573,230.179 170.742 C 230.179 170.933,230.372 171.049,230.691 171.049 C 231.009 171.049,231.202 171.165,231.202 171.355 C 231.202 171.526,231.384 171.662,231.611 171.662 C 231.836 171.662,232.020 171.753,232.020 171.863 C 232.020 171.973,232.274 172.127,232.583 172.204 C 232.893 172.281,233.551 172.559,234.046 172.822 C 234.541 173.084,235.291 173.299,235.712 173.299 C 236.204 173.299,236.520 173.409,236.596 173.606 C 236.688 173.847,237.105 173.913,238.536 173.913 C 239.907 173.913,240.422 173.989,240.614 174.220 C 240.812 174.458,241.366 174.527,243.101 174.527 C 244.896 174.527,245.356 174.467,245.450 174.220 C 245.543 173.977,245.971 173.913,247.496 173.913 C 249.022 173.913,249.449 173.849,249.542 173.606 C 249.623 173.396,249.959 173.297,250.610 173.293 C 251.133 173.289,251.739 173.151,251.957 172.986 C 252.176 172.821,252.613 172.685,252.929 172.685 C 253.245 172.685,253.504 172.603,253.504 172.503 C 253.504 172.403,253.734 172.263,254.015 172.192 C 254.297 172.122,254.527 171.973,254.527 171.863 C 254.527 171.753,254.704 171.662,254.921 171.662 C 255.138 171.662,255.454 171.524,255.623 171.355 C 255.792 171.187,256.026 171.049,256.143 171.049 C 256.260 171.049,256.560 170.772,256.810 170.435 C 257.059 170.097,257.424 169.821,257.621 169.821 C 257.817 169.821,258.041 169.622,258.118 169.380 C 258.195 169.137,258.477 168.735,258.745 168.487 C 259.013 168.238,259.233 167.930,259.233 167.803 C 259.233 167.675,259.371 167.570,259.540 167.570 C 259.708 167.570,259.847 167.474,259.847 167.356 C 259.847 167.238,260.070 166.934,260.344 166.681 C 260.617 166.427,260.908 165.954,260.989 165.630 C 261.071 165.305,261.261 164.804,261.411 164.515 C 261.562 164.226,261.686 163.875,261.687 163.734 C 261.687 163.593,261.780 163.478,261.893 163.478 C 262.005 163.478,262.097 163.350,262.097 163.193 C 262.097 163.036,262.235 162.855,262.404 162.790 C 262.634 162.702,262.713 162.325,262.718 161.285 C 262.721 160.474,262.834 159.753,262.990 159.548 C 263.421 158.981,263.459 152.468,263.032 152.305 C 262.778 152.207,262.711 151.844,262.711 150.560 C 262.711 149.307,262.641 148.912,262.404 148.821 C 262.206 148.745,262.097 148.428,262.097 147.924 C 262.097 147.495,262.000 147.112,261.881 147.072 C 261.763 147.033,261.640 146.864,261.609 146.697 C 261.433 145.756,261.024 144.634,260.762 144.372 C 260.596 144.206,260.460 143.972,260.460 143.851 C 260.460 143.730,260.322 143.632,260.153 143.632 C 259.985 143.632,259.847 143.463,259.847 143.256 C 259.847 143.050,259.443 142.471,258.949 141.971 C 258.456 141.470,258.018 140.880,257.976 140.658 C 257.919 140.358,257.704 140.240,257.134 140.192 C 256.633 140.151,256.368 140.027,256.368 139.834 C 256.368 139.672,256.230 139.540,256.061 139.540 C 255.893 139.540,255.754 139.454,255.754 139.350 C 255.754 139.111,254.582 138.517,254.110 138.517 C 253.915 138.517,253.598 138.277,253.406 137.983 C 253.151 137.593,252.996 137.511,252.830 137.676 C 252.506 138.000,251.931 137.956,251.793 137.596 C 251.716 137.395,251.397 137.289,250.872 137.289 C 250.347 137.289,250.029 137.183,249.952 136.982 C 249.860 136.743,249.456 136.675,248.129 136.675 C 247.038 136.675,246.333 136.583,246.169 136.419 C 245.912 136.162,240.848 135.983,239.847 136.196 M284.120 136.370 C 283.744 136.566,282.953 136.675,281.914 136.675 C 280.663 136.675,280.267 136.745,280.176 136.982 C 280.099 137.183,279.781 137.289,279.256 137.289 C 278.731 137.289,278.412 137.395,278.335 137.596 C 278.263 137.782,277.954 137.903,277.548 137.903 C 277.180 137.903,276.764 138.041,276.624 138.210 C 276.484 138.379,276.273 138.517,276.156 138.517 C 275.793 138.517,274.373 139.200,274.373 139.374 C 274.373 139.465,274.235 139.540,274.066 139.540 C 273.898 139.540,273.760 139.678,273.760 139.847 C 273.760 140.015,273.621 140.153,273.453 140.153 C 273.284 140.153,273.146 140.292,273.146 140.460 C 273.146 140.629,273.008 140.767,272.839 140.767 C 272.670 140.767,272.532 140.905,272.532 141.074 C 272.532 141.243,272.433 141.381,272.311 141.381 C 272.076 141.381,270.281 143.099,270.281 143.323 C 270.281 143.396,270.143 143.594,269.974 143.763 C 269.806 143.932,269.668 144.248,269.668 144.465 C 269.668 144.682,269.529 144.859,269.361 144.859 C 269.181 144.859,269.051 145.050,269.047 145.320 C 269.044 145.573,268.906 145.959,268.740 146.177 C 268.575 146.396,268.440 146.730,268.440 146.921 C 268.440 147.112,268.302 147.532,268.134 147.854 C 267.966 148.176,267.828 148.785,267.827 149.207 C 267.827 149.629,267.734 149.974,267.621 149.974 C 267.490 149.974,267.417 151.880,267.417 155.282 C 267.417 158.600,267.494 160.637,267.621 160.716 C 267.734 160.786,267.827 161.136,267.827 161.495 C 267.828 161.855,267.966 162.412,268.134 162.734 C 268.302 163.057,268.440 163.494,268.440 163.706 C 268.440 163.918,268.532 164.092,268.645 164.092 C 268.757 164.092,268.834 164.161,268.817 164.246 C 268.760 164.515,269.116 165.212,269.396 165.381 C 269.545 165.471,269.668 165.760,269.668 166.024 C 269.668 166.288,269.806 166.557,269.974 166.621 C 270.143 166.686,270.281 166.884,270.281 167.062 C 270.281 167.240,270.499 167.588,270.764 167.836 C 271.030 168.084,271.312 168.493,271.392 168.746 C 271.471 168.999,271.760 169.262,272.034 169.331 C 272.308 169.400,272.532 169.538,272.532 169.639 C 272.532 169.739,272.670 169.821,272.839 169.821 C 273.008 169.821,273.146 169.959,273.146 170.128 C 273.146 170.297,273.284 170.435,273.453 170.435 C 273.621 170.435,273.760 170.573,273.760 170.742 C 273.760 170.910,273.888 171.049,274.045 171.049 C 274.201 171.049,274.383 171.187,274.447 171.355 C 274.521 171.548,274.834 171.662,275.288 171.662 C 275.794 171.662,276.010 171.754,276.010 171.969 C 276.010 172.160,276.203 172.276,276.522 172.276 C 276.803 172.276,277.033 172.368,277.033 172.481 C 277.033 172.593,277.252 172.685,277.520 172.685 C 277.787 172.685,278.121 172.824,278.261 172.992 C 278.422 173.187,278.874 173.299,279.492 173.299 C 280.171 173.299,280.504 173.393,280.585 173.606 C 280.652 173.779,280.956 173.913,281.283 173.913 C 281.601 173.913,281.975 174.026,282.113 174.164 C 282.310 174.361,282.448 174.361,282.764 174.164 C 283.293 173.834,286.511 173.837,287.436 174.169 C 288.006 174.373,288.166 174.373,288.235 174.169 C 288.297 173.982,289.031 173.913,290.963 173.913 C 293.176 173.913,293.606 173.863,293.606 173.606 C 293.606 173.368,293.876 173.299,294.809 173.299 C 295.628 173.299,296.092 173.201,296.266 172.992 C 296.406 172.824,296.648 172.685,296.803 172.685 C 296.958 172.685,297.084 172.605,297.084 172.508 C 297.084 172.410,297.415 172.276,297.819 172.211 C 298.226 172.144,298.769 171.859,299.037 171.570 C 299.303 171.283,299.617 171.049,299.734 171.049 C 299.852 171.049,299.949 170.910,299.949 170.742 C 299.949 170.570,300.131 170.435,300.362 170.435 C 300.607 170.435,301.293 169.881,302.050 169.073 C 302.751 168.323,303.578 167.458,303.887 167.149 C 304.197 166.840,304.450 166.452,304.450 166.286 C 304.450 166.120,304.588 165.869,304.757 165.729 C 304.926 165.589,305.064 165.163,305.064 164.783 C 305.064 164.305,305.159 164.092,305.371 164.092 C 305.591 164.092,305.678 163.867,305.678 163.296 C 305.678 162.776,305.785 162.458,305.985 162.381 C 306.195 162.300,306.292 161.971,306.292 161.329 C 306.292 160.797,306.440 160.168,306.637 159.867 C 307.103 159.156,307.059 150.865,306.584 149.946 C 306.423 149.635,306.292 149.008,306.292 148.552 C 306.292 147.952,306.207 147.724,305.985 147.724 C 305.783 147.724,305.678 147.522,305.678 147.135 C 305.678 146.811,305.540 146.432,305.371 146.292 C 305.202 146.151,305.062 145.841,305.059 145.602 C 305.057 145.362,304.882 144.942,304.671 144.667 C 304.460 144.393,304.333 144.051,304.388 143.907 C 304.522 143.559,303.685 142.404,303.299 142.404 C 302.994 142.404,301.790 141.225,301.790 140.926 C 301.790 140.839,301.652 140.767,301.483 140.767 C 301.315 140.767,301.176 140.629,301.176 140.460 C 301.176 140.292,301.048 140.153,300.891 140.153 C 300.735 140.153,300.553 140.015,300.489 139.847 C 300.424 139.678,300.230 139.540,300.058 139.540 C 299.885 139.540,299.744 139.467,299.744 139.379 C 299.744 139.100,298.599 138.529,297.937 138.479 C 297.586 138.452,297.254 138.312,297.198 138.167 C 297.143 138.022,296.828 137.903,296.499 137.903 C 296.156 137.903,295.850 137.772,295.783 137.596 C 295.712 137.412,295.397 137.286,294.994 137.282 C 294.624 137.279,294.144 137.141,293.925 136.976 C 293.675 136.787,293.058 136.675,292.260 136.675 C 291.534 136.675,290.743 136.545,290.407 136.370 C 289.978 136.146,289.134 136.064,287.263 136.064 C 285.393 136.064,284.549 136.146,284.120 136.370 M158.855 137.106 C 158.479 137.521,158.463 138.156,158.409 154.943 C 158.374 165.533,158.276 172.442,158.158 172.584 C 158.034 172.734,158.044 172.899,158.187 173.041 C 158.310 173.164,158.517 173.480,158.648 173.742 C 158.978 174.408,159.614 174.440,160.197 173.819 L 160.685 173.299 166.456 173.299 L 172.228 173.299 172.763 172.597 C 173.573 171.536,173.350 169.442,172.517 170.276 C 172.332 170.460,172.278 166.793,172.282 154.568 C 172.287 143.514,172.353 138.730,172.500 138.981 C 172.746 139.404,173.095 139.266,173.095 138.747 C 173.095 138.302,172.065 137.289,171.612 137.289 C 171.428 137.289,171.220 137.197,171.151 137.084 C 171.081 136.972,170.800 136.880,170.525 136.880 C 170.250 136.880,170.026 136.972,170.026 137.084 C 170.026 137.443,160.800 137.339,160.319 136.976 C 159.769 136.559,159.313 136.600,158.855 137.106 M89.821 137.268 C 90.327 137.382,91.312 137.480,92.008 137.485 C 92.705 137.490,93.329 137.580,93.394 137.686 C 93.460 137.792,93.927 137.941,94.432 138.017 C 94.937 138.093,95.396 138.228,95.451 138.318 C 95.507 138.408,95.920 138.543,96.369 138.619 C 96.819 138.695,97.187 138.841,97.187 138.944 C 97.187 139.046,97.406 139.130,97.673 139.130 C 97.941 139.130,98.274 139.269,98.414 139.437 C 98.554 139.606,98.796 139.744,98.951 139.744 C 99.106 139.744,99.233 139.830,99.233 139.935 C 99.233 140.040,99.394 140.179,99.591 140.244 C 99.788 140.309,100.237 140.614,100.590 140.923 C 100.943 141.231,101.449 141.673,101.715 141.904 C 102.246 142.366,103.522 143.894,103.819 144.423 C 103.922 144.607,104.060 144.803,104.126 144.859 C 104.192 144.916,104.417 145.330,104.627 145.780 C 104.837 146.230,105.137 146.843,105.292 147.142 C 105.448 147.440,105.578 147.901,105.582 148.165 C 105.586 148.429,105.724 148.823,105.889 149.042 C 106.077 149.290,106.189 149.906,106.189 150.689 C 106.189 151.376,106.289 152.039,106.412 152.161 C 106.676 152.425,106.679 158.116,106.415 158.451 C 106.321 158.572,106.192 159.266,106.129 159.995 C 106.067 160.724,105.916 161.353,105.795 161.393 C 105.674 161.433,105.575 161.727,105.575 162.047 C 105.575 162.366,105.443 162.887,105.280 163.206 C 105.118 163.525,104.816 164.153,104.609 164.604 C 103.804 166.353,100.962 169.821,100.334 169.821 C 100.206 169.821,99.994 169.951,99.862 170.109 C 99.731 170.267,99.328 170.546,98.968 170.728 C 98.607 170.911,98.174 171.136,98.005 171.230 C 96.840 171.875,96.342 172.072,95.876 172.072 C 95.584 172.072,95.345 172.158,95.345 172.264 C 95.345 172.369,94.908 172.520,94.373 172.599 C 93.839 172.678,93.337 172.842,93.259 172.964 C 93.042 173.302,82.150 173.280,81.811 172.941 C 81.670 172.801,81.334 172.685,81.064 172.685 C 80.794 172.685,80.283 172.559,79.929 172.403 C 79.574 172.248,78.824 171.960,78.261 171.762 C 77.698 171.564,77.100 171.295,76.931 171.164 C 76.762 171.033,76.279 170.749,75.857 170.532 C 75.435 170.315,75.090 170.066,75.090 169.979 C 75.090 169.892,74.968 169.821,74.820 169.821 C 74.672 169.821,73.912 169.153,73.132 168.336 C 71.697 166.833,71.356 166.393,71.010 165.595 C 70.904 165.353,70.720 165.094,70.601 165.021 C 70.481 164.947,70.384 164.747,70.384 164.577 C 70.384 164.407,70.246 164.129,70.077 163.961 C 69.908 163.792,69.770 163.384,69.770 163.054 C 69.770 162.725,69.686 162.455,69.583 162.455 C 69.481 162.455,69.332 162.064,69.253 161.586 C 69.174 161.107,69.006 160.587,68.878 160.430 C 68.559 160.036,68.555 150.559,68.874 150.158 C 68.999 150.001,69.153 149.460,69.217 148.956 C 69.282 148.452,69.432 148.007,69.552 147.967 C 69.672 147.927,69.770 147.637,69.770 147.323 C 69.770 147.008,69.908 146.636,70.077 146.496 C 70.246 146.356,70.384 146.080,70.384 145.882 C 70.384 145.685,70.522 145.409,70.691 145.269 C 70.859 145.128,70.997 144.926,70.997 144.820 C 70.997 144.713,71.113 144.505,71.253 144.358 C 71.394 144.211,71.647 143.887,71.816 143.638 C 72.730 142.289,75.653 139.744,76.289 139.744 C 76.389 139.744,76.586 139.606,76.726 139.437 C 76.866 139.269,77.154 139.130,77.365 139.130 C 77.576 139.130,77.749 139.046,77.749 138.944 C 77.749 138.841,78.118 138.695,78.568 138.619 C 79.018 138.543,79.386 138.409,79.386 138.320 C 79.386 138.232,79.847 138.099,80.409 138.024 C 80.972 137.950,81.432 137.800,81.432 137.691 C 81.432 137.583,82.008 137.489,82.711 137.484 C 83.414 137.479,84.588 137.347,85.320 137.191 C 86.717 136.893,88.280 136.920,89.821 137.268 M244.930 137.095 C 245.151 137.213,246.135 137.360,247.116 137.421 C 248.097 137.482,249.190 137.661,249.545 137.820 C 249.900 137.978,250.378 138.107,250.607 138.107 C 250.837 138.107,251.074 138.187,251.134 138.285 C 251.195 138.383,251.614 138.522,252.067 138.594 C 252.520 138.667,252.890 138.817,252.890 138.928 C 252.890 139.039,253.068 139.130,253.285 139.130 C 253.502 139.130,253.817 139.269,253.986 139.437 C 254.155 139.606,254.433 139.744,254.604 139.744 C 254.776 139.744,254.989 139.859,255.079 140.000 C 255.169 140.141,255.556 140.430,255.939 140.644 C 257.190 141.341,260.256 144.988,260.256 145.779 C 260.256 145.924,260.394 146.096,260.563 146.161 C 260.731 146.226,260.870 146.501,260.870 146.772 C 260.870 147.043,261.008 147.379,261.176 147.519 C 261.364 147.675,261.483 148.123,261.483 148.670 C 261.483 149.162,261.567 149.565,261.669 149.565 C 261.771 149.565,261.920 150.441,262.000 151.512 C 262.081 152.583,262.227 153.509,262.326 153.570 C 262.560 153.714,262.562 155.850,262.328 155.994 C 262.230 156.054,262.084 157.211,262.003 158.563 C 261.923 159.916,261.785 161.023,261.697 161.023 C 261.609 161.023,261.485 161.412,261.421 161.888 C 261.357 162.364,261.207 162.786,261.087 162.826 C 260.968 162.866,260.870 163.110,260.870 163.368 C 260.870 163.626,260.731 163.952,260.563 164.092 C 260.394 164.232,260.256 164.508,260.256 164.706 C 260.256 164.903,260.118 165.180,259.949 165.320 C 259.780 165.460,259.642 165.656,259.642 165.756 C 259.642 166.253,256.567 169.821,256.139 169.821 C 256.030 169.821,255.804 169.936,255.636 170.077 C 255.468 170.217,255.218 170.425,255.079 170.537 C 254.941 170.650,254.461 170.914,254.012 171.124 C 253.564 171.333,252.953 171.633,252.654 171.788 C 252.355 171.944,251.872 172.072,251.580 172.072 C 251.288 172.072,251.049 172.153,251.049 172.253 C 251.049 172.353,250.621 172.499,250.098 172.577 C 249.575 172.655,248.999 172.795,248.819 172.887 C 248.434 173.085,243.952 173.559,242.762 173.529 C 241.340 173.493,237.651 173.030,237.545 172.875 C 237.488 172.793,237.004 172.660,236.468 172.580 C 235.932 172.499,235.443 172.352,235.382 172.253 C 235.320 172.153,235.010 172.072,234.693 172.072 C 234.376 172.072,234.002 171.934,233.862 171.765 C 233.722 171.596,233.388 171.458,233.121 171.458 C 232.853 171.458,232.634 171.372,232.634 171.267 C 232.634 171.162,232.439 171.014,232.200 170.938 C 231.042 170.571,227.690 167.611,227.401 166.702 C 227.338 166.504,227.211 166.343,227.118 166.343 C 227.026 166.343,226.892 166.113,226.821 165.831 C 226.751 165.550,226.603 165.320,226.492 165.320 C 226.382 165.320,226.292 165.193,226.292 165.038 C 226.292 164.883,226.153 164.641,225.985 164.501 C 225.816 164.361,225.675 164.005,225.671 163.709 C 225.668 163.413,225.530 162.993,225.364 162.774 C 225.199 162.556,225.064 162.163,225.064 161.902 C 225.064 161.641,224.977 161.267,224.871 161.071 C 224.380 160.167,223.829 153.451,224.207 152.979 C 224.314 152.846,224.466 152.024,224.545 151.152 C 224.625 150.281,224.774 149.516,224.877 149.452 C 224.980 149.389,225.064 149.083,225.064 148.774 C 225.064 148.464,225.199 148.032,225.364 147.814 C 225.530 147.596,225.668 147.175,225.671 146.879 C 225.675 146.584,225.816 146.227,225.985 146.087 C 226.153 145.947,226.292 145.659,226.292 145.448 C 226.292 145.237,226.387 145.064,226.503 145.064 C 226.619 145.064,226.771 144.903,226.841 144.706 C 226.977 144.325,227.919 143.115,228.879 142.087 C 229.676 141.235,231.960 139.584,232.839 139.226 C 233.008 139.157,233.306 139.015,233.501 138.911 C 233.696 138.807,233.973 138.721,234.115 138.720 C 234.257 138.719,234.619 138.591,234.919 138.434 C 235.220 138.277,235.841 138.086,236.300 138.008 C 236.760 137.930,237.136 137.796,237.136 137.710 C 237.136 137.624,237.987 137.501,239.028 137.437 C 240.069 137.374,241.151 137.228,241.432 137.113 C 242.113 136.837,244.425 136.825,244.930 137.095 M289.003 137.183 C 289.790 137.350,291.005 137.488,291.701 137.490 C 292.398 137.492,293.023 137.583,293.091 137.692 C 293.158 137.802,293.670 137.952,294.228 138.026 C 294.786 138.100,295.243 138.233,295.243 138.322 C 295.243 138.411,295.539 138.549,295.901 138.629 C 296.263 138.708,296.701 138.847,296.873 138.937 C 297.046 139.027,297.325 139.153,297.494 139.216 C 298.101 139.446,300.195 140.932,300.324 141.226 C 300.361 141.311,300.523 141.381,300.682 141.381 C 300.841 141.381,300.972 141.519,300.972 141.688 C 300.972 141.857,301.072 141.995,301.195 141.995 C 301.529 141.995,303.440 144.447,303.905 145.473 C 303.982 145.642,304.217 146.063,304.428 146.409 C 304.639 146.755,304.879 147.354,304.961 147.739 C 305.044 148.125,305.181 148.532,305.267 148.645 C 305.353 148.757,305.488 149.470,305.567 150.228 C 305.645 150.986,305.795 151.659,305.898 151.723 C 306.156 151.883,306.142 158.635,305.884 158.894 C 305.772 159.006,305.621 159.669,305.548 160.367 C 305.475 161.065,305.346 161.637,305.262 161.637 C 305.178 161.637,305.047 161.970,304.970 162.378 C 304.894 162.786,304.750 163.269,304.651 163.452 C 304.551 163.635,304.307 164.153,304.109 164.604 C 303.366 166.288,299.963 170.230,299.252 170.230 C 299.196 170.230,298.742 170.506,298.241 170.844 C 297.741 171.182,297.207 171.461,297.055 171.464 C 296.902 171.468,296.599 171.606,296.380 171.771 C 296.162 171.936,295.827 172.072,295.636 172.072 C 295.446 172.072,295.026 172.209,294.704 172.377 C 294.381 172.545,293.837 172.683,293.494 172.684 C 293.150 172.685,292.754 172.801,292.614 172.941 C 292.265 173.290,281.730 173.306,281.308 172.958 C 281.151 172.829,280.586 172.659,280.051 172.579 C 279.517 172.499,279.079 172.353,279.079 172.253 C 279.079 172.153,278.814 172.072,278.491 172.072 C 278.167 172.072,277.787 171.934,277.647 171.765 C 277.507 171.596,277.185 171.458,276.931 171.458 C 276.677 171.458,276.355 171.320,276.215 171.151 C 276.075 170.982,275.833 170.844,275.678 170.844 C 275.523 170.844,275.396 170.766,275.396 170.671 C 275.396 170.575,275.223 170.414,275.011 170.313 C 273.629 169.650,271.466 167.467,270.659 165.919 C 270.428 165.476,270.156 165.062,270.056 165.000 C 269.955 164.937,269.872 164.719,269.872 164.514 C 269.872 164.310,269.734 164.028,269.565 163.887 C 269.396 163.747,269.258 163.379,269.258 163.069 C 269.258 162.759,269.120 162.391,268.951 162.251 C 268.778 162.107,268.645 161.661,268.645 161.226 C 268.645 160.802,268.507 160.192,268.339 159.870 C 268.098 159.409,268.033 158.435,268.033 155.294 C 268.033 152.153,268.098 151.180,268.339 150.718 C 268.507 150.396,268.645 149.740,268.645 149.260 C 268.645 148.734,268.766 148.287,268.951 148.133 C 269.120 147.993,269.258 147.623,269.258 147.311 C 269.258 146.996,269.395 146.692,269.565 146.627 C 269.734 146.562,269.872 146.276,269.872 145.991 C 269.872 145.706,269.958 145.473,270.063 145.473 C 270.168 145.473,270.317 145.273,270.395 145.029 C 270.529 144.605,270.675 144.386,271.253 143.742 C 271.394 143.585,271.509 143.369,271.509 143.263 C 271.509 142.989,274.149 140.595,274.783 140.294 C 274.951 140.214,275.366 139.967,275.703 139.744 C 276.041 139.522,276.455 139.285,276.624 139.219 C 276.793 139.153,277.175 138.967,277.474 138.807 C 277.773 138.648,278.210 138.517,278.446 138.517 C 278.682 138.517,278.875 138.437,278.875 138.341 C 278.875 138.244,279.357 138.107,279.948 138.037 C 280.538 137.967,281.052 137.817,281.090 137.702 C 281.128 137.587,281.773 137.485,282.523 137.474 C 283.274 137.463,284.394 137.338,285.013 137.195 C 286.577 136.835,287.349 136.833,289.003 137.183 M373.525 137.726 C 373.649 137.823,374.339 137.963,375.059 138.036 C 375.779 138.110,376.414 138.227,376.471 138.296 C 376.527 138.366,376.828 138.535,377.139 138.672 L 377.706 138.921 377.674 141.430 C 377.657 142.810,377.571 144.031,377.484 144.143 C 377.397 144.256,377.294 144.624,377.256 144.962 C 377.173 145.696,376.355 145.906,375.609 145.384 C 375.358 145.208,374.965 145.063,374.737 145.061 C 374.509 145.059,373.954 144.925,373.504 144.763 C 373.054 144.601,372.207 144.464,371.623 144.459 C 371.039 144.454,370.504 144.358,370.435 144.246 C 370.365 144.133,369.491 144.041,368.491 144.041 C 367.492 144.041,366.617 144.133,366.547 144.246 C 366.478 144.358,366.108 144.450,365.725 144.450 C 364.183 144.450,362.762 145.756,362.762 147.174 C 362.762 148.181,363.973 149.433,365.734 150.248 C 366.182 150.455,366.808 150.754,367.127 150.913 C 367.445 151.072,367.875 151.202,368.082 151.202 C 368.289 151.202,368.719 151.335,369.037 151.496 C 370.195 152.085,371.120 152.430,371.540 152.430 C 371.776 152.430,371.969 152.518,371.969 152.625 C 371.969 152.732,372.292 152.881,372.685 152.955 C 373.079 153.029,373.402 153.171,373.402 153.271 C 373.402 153.371,373.626 153.453,373.901 153.453 C 374.176 153.453,374.461 153.550,374.535 153.670 C 374.608 153.789,374.867 153.973,375.109 154.079 C 375.680 154.327,376.244 154.698,376.685 155.118 C 376.879 155.302,377.166 155.532,377.323 155.629 C 377.701 155.864,378.926 157.448,378.926 157.703 C 378.926 157.813,379.064 158.018,379.233 158.159 C 379.402 158.299,379.540 158.671,379.540 158.985 C 379.540 159.299,379.644 159.591,379.772 159.634 C 380.100 159.744,380.112 163.806,379.785 164.133 C 379.650 164.268,379.540 164.711,379.540 165.117 C 379.540 165.523,379.404 166.034,379.239 166.252 C 379.074 166.471,378.936 166.814,378.932 167.014 C 378.929 167.215,378.788 167.432,378.619 167.496 C 378.450 167.561,378.312 167.697,378.312 167.799 C 378.312 168.207,376.109 170.432,375.703 170.434 C 375.563 170.434,375.448 170.527,375.448 170.639 C 375.448 170.752,375.307 170.844,375.134 170.844 C 374.962 170.844,374.768 170.982,374.703 171.151 C 374.638 171.320,374.388 171.461,374.147 171.464 C 373.906 171.468,373.530 171.606,373.311 171.771 C 373.093 171.936,372.709 172.072,372.459 172.072 C 372.208 172.072,371.972 172.166,371.934 172.281 C 371.895 172.396,371.496 172.542,371.047 172.604 C 370.598 172.667,370.046 172.797,369.821 172.894 C 368.463 173.478,356.894 173.437,356.306 172.846 C 356.226 172.765,355.619 172.638,354.956 172.563 C 354.293 172.488,353.701 172.347,353.641 172.249 C 353.580 172.152,353.306 172.072,353.031 172.072 C 351.870 172.072,351.714 171.577,351.714 167.892 C 351.714 164.000,351.937 163.373,353.031 164.201 C 353.250 164.366,353.595 164.501,353.799 164.501 C 354.002 164.501,354.169 164.593,354.169 164.706 C 354.169 164.818,354.480 164.910,354.860 164.910 C 355.240 164.910,355.666 165.049,355.806 165.217 C 355.946 165.386,356.360 165.524,356.726 165.524 C 357.093 165.524,357.507 165.662,357.647 165.831 C 357.823 166.043,358.292 166.138,359.166 166.138 C 359.886 166.138,360.537 166.245,360.679 166.387 C 361.025 166.733,364.698 166.739,365.043 166.394 C 365.184 166.253,365.554 166.138,365.866 166.138 C 367.459 166.138,368.904 164.707,368.893 163.140 C 368.884 161.803,368.501 161.375,366.445 160.403 C 365.939 160.164,365.280 159.837,364.981 159.677 C 364.683 159.517,364.268 159.383,364.061 159.380 C 363.853 159.376,363.504 159.238,363.286 159.073 C 363.067 158.908,362.681 158.772,362.428 158.772 C 362.175 158.772,361.911 158.680,361.841 158.568 C 361.772 158.455,361.559 158.363,361.369 158.362 C 361.179 158.361,360.759 158.223,360.437 158.055 C 360.115 157.887,359.695 157.749,359.504 157.749 C 359.314 157.749,358.979 157.614,358.760 157.449 C 358.542 157.284,358.156 157.146,357.903 157.142 C 357.650 157.138,357.442 157.065,357.442 156.979 C 357.442 156.893,356.982 156.604,356.418 156.337 C 355.855 156.069,355.160 155.633,354.873 155.368 C 354.587 155.102,354.288 154.881,354.209 154.875 C 353.975 154.859,352.327 152.713,352.327 152.423 C 352.327 152.275,352.173 151.985,351.985 151.777 C 351.519 151.262,351.516 145.805,351.981 144.918 C 352.145 144.604,352.452 143.989,352.662 143.551 C 353.305 142.206,356.546 139.130,357.318 139.130 C 357.499 139.130,357.647 139.039,357.647 138.928 C 357.647 138.817,358.015 138.667,358.465 138.595 C 358.916 138.523,359.284 138.393,359.284 138.305 C 359.284 138.217,359.744 138.083,360.307 138.005 C 360.870 137.928,361.330 137.784,361.330 137.685 C 361.330 137.317,373.053 137.356,373.525 137.726 M171.202 138.171 C 171.403 138.301,171.458 141.956,171.458 155.311 L 171.458 172.286 170.933 172.486 C 169.805 172.915,160.049 172.734,159.591 172.276 C 159.188 171.874,159.182 171.594,159.182 155.083 L 159.182 138.299 159.642 138.107 C 160.198 137.877,170.837 137.935,171.202 138.171 M85.115 145.085 C 83.457 145.989,82.057 147.849,82.040 149.169 C 82.036 149.443,81.898 149.846,81.733 150.065 C 81.383 150.527,81.313 153.568,81.640 154.066 C 81.996 154.608,82.244 153.891,82.248 152.312 C 82.250 151.034,82.311 150.808,82.762 150.384 C 83.167 150.003,83.274 149.703,83.274 148.941 C 83.274 148.335,83.387 147.884,83.581 147.724 C 83.749 147.584,83.887 147.342,83.887 147.187 C 83.887 147.032,84.026 146.905,84.194 146.905 C 84.363 146.905,84.501 146.813,84.501 146.701 C 84.501 146.588,84.636 146.496,84.801 146.496 C 84.966 146.496,85.384 146.220,85.729 145.882 C 86.586 145.044,88.480 144.975,89.070 145.760 C 89.273 146.030,89.741 146.308,90.110 146.377 C 90.637 146.476,90.866 146.678,91.171 147.316 C 91.385 147.763,91.675 148.129,91.816 148.131 C 91.977 148.132,92.072 148.434,92.072 148.951 C 92.072 149.402,92.150 149.770,92.247 149.770 C 92.343 149.770,92.475 150.473,92.540 151.332 C 92.605 152.190,92.756 152.992,92.876 153.112 C 93.161 153.396,93.165 157.392,92.881 157.677 C 92.763 157.794,92.612 158.549,92.544 159.355 C 92.477 160.160,92.343 160.818,92.247 160.818 C 92.150 160.818,92.072 161.095,92.072 161.432 C 92.072 161.770,91.981 162.046,91.871 162.046 C 91.761 162.046,91.614 162.268,91.546 162.540 C 91.470 162.842,91.222 163.084,90.907 163.163 C 90.491 163.267,90.409 163.390,90.487 163.795 C 90.539 164.071,90.488 164.297,90.373 164.297 C 90.012 164.297,88.593 164.981,88.593 165.154 C 88.593 165.245,88.133 165.320,87.570 165.320 C 87.008 165.320,86.547 165.229,86.547 165.119 C 86.547 165.009,86.317 164.861,86.036 164.790 C 85.754 164.719,85.524 164.579,85.524 164.479 C 85.524 164.379,85.288 164.297,84.999 164.297 C 84.585 164.297,84.499 164.218,84.591 163.926 C 84.666 163.692,84.538 163.396,84.247 163.126 C 83.405 162.344,82.967 161.544,82.928 160.716 C 82.872 159.509,82.636 158.085,82.455 157.852 C 82.368 157.739,82.231 157.071,82.151 156.368 C 81.967 154.750,81.730 154.587,81.564 155.964 C 81.323 157.971,81.408 160.151,81.739 160.482 C 81.908 160.651,82.046 161.013,82.046 161.287 C 82.046 162.534,83.987 165.178,85.113 165.464 C 85.393 165.535,85.745 165.716,85.895 165.866 C 86.288 166.258,88.481 166.217,89.278 165.802 C 89.633 165.617,90.153 165.350,90.435 165.209 C 90.716 165.068,91.247 164.552,91.614 164.062 C 91.981 163.572,92.372 163.060,92.483 162.924 C 92.595 162.788,92.685 162.553,92.685 162.401 C 92.685 162.249,92.821 161.946,92.986 161.727 C 93.151 161.509,93.289 160.911,93.293 160.399 C 93.296 159.887,93.414 159.353,93.554 159.213 C 93.979 158.788,94.037 153.075,93.629 151.825 C 93.447 151.271,93.299 150.484,93.299 150.075 C 93.299 149.666,93.161 149.193,92.992 149.024 C 92.824 148.856,92.685 148.551,92.685 148.346 C 92.685 147.522,90.716 145.071,90.043 145.057 C 89.865 145.054,89.540 144.916,89.322 144.751 C 88.594 144.200,86.421 144.373,85.115 145.085 M241.522 144.751 C 241.304 144.916,241.004 145.054,240.856 145.057 C 240.008 145.078,237.962 147.567,237.947 148.596 C 237.944 148.848,237.806 149.232,237.641 149.451 C 237.475 149.669,237.340 150.204,237.340 150.640 C 237.340 151.076,237.191 151.889,237.008 152.447 C 236.613 153.655,236.677 158.191,237.096 158.610 C 237.230 158.744,237.340 159.325,237.340 159.900 C 237.340 160.502,237.467 161.113,237.641 161.342 C 237.806 161.560,237.944 161.935,237.947 162.174 C 237.951 162.414,238.092 162.724,238.261 162.864 C 238.430 163.005,238.568 163.246,238.568 163.401 C 238.568 163.556,238.660 163.683,238.772 163.683 C 238.885 163.683,238.977 163.794,238.977 163.930 C 238.977 164.256,240.427 165.514,240.818 165.527 C 240.987 165.533,241.304 165.672,241.522 165.838 C 242.075 166.256,244.562 166.251,244.910 165.831 C 245.051 165.662,245.327 165.524,245.524 165.524 C 245.722 165.524,245.998 165.386,246.138 165.217 C 246.278 165.049,246.497 164.910,246.624 164.909 C 247.039 164.907,248.012 163.262,248.800 161.228 C 248.953 160.834,249.114 159.752,249.158 158.824 C 249.201 157.895,249.323 157.136,249.427 157.136 C 249.531 157.136,249.616 156.261,249.616 155.192 C 249.616 154.032,249.534 153.248,249.412 153.248 C 249.294 153.248,249.204 152.579,249.201 151.662 C 249.196 150.594,249.096 149.947,248.894 149.680 C 248.729 149.461,248.593 149.077,248.593 148.827 C 248.593 148.287,248.061 147.239,247.417 146.510 C 247.164 146.223,246.957 145.919,246.957 145.833 C 246.957 145.748,246.818 145.678,246.650 145.678 C 246.481 145.678,246.343 145.587,246.343 145.477 C 246.343 145.367,246.090 145.213,245.782 145.136 C 245.474 145.058,245.099 144.872,244.949 144.723 C 244.564 144.338,242.041 144.358,241.522 144.751 M284.873 144.838 C 283.575 145.564,281.944 147.331,281.944 148.010 C 281.944 148.177,281.852 148.370,281.739 148.440 C 281.627 148.509,281.535 148.922,281.535 149.356 C 281.535 149.805,281.424 150.182,281.279 150.230 C 280.687 150.427,280.667 159.487,281.256 160.655 C 281.409 160.959,281.535 161.396,281.535 161.627 C 281.535 161.857,281.625 162.046,281.735 162.046 C 281.846 162.046,281.998 162.299,282.074 162.609 C 282.149 162.918,282.266 163.217,282.333 163.274 C 282.400 163.330,282.555 163.560,282.676 163.785 C 283.628 165.551,287.762 166.956,288.696 165.831 C 288.836 165.662,289.142 165.524,289.376 165.524 C 289.800 165.524,291.560 163.855,291.560 163.453 C 291.560 163.338,291.698 163.106,291.867 162.938 C 292.036 162.769,292.174 162.464,292.174 162.261 C 292.174 162.058,292.312 161.777,292.481 161.637 C 292.652 161.495,292.788 161.049,292.788 160.630 C 292.788 160.216,292.903 159.762,293.043 159.621 C 293.405 159.260,293.401 151.324,293.040 150.963 C 292.901 150.824,292.788 150.425,292.788 150.075 C 292.788 149.725,292.653 149.260,292.487 149.042 C 292.322 148.823,292.184 148.449,292.180 148.209 C 292.177 147.970,292.036 147.659,291.867 147.519 C 291.698 147.379,291.560 147.183,291.560 147.083 C 291.560 145.332,286.829 143.744,284.873 144.838 M128.900 145.371 C 128.760 145.540,128.542 145.679,128.415 145.681 C 127.981 145.687,126.889 146.826,126.446 147.736 C 126.202 148.236,125.918 148.804,125.815 149.000 C 125.711 149.195,125.627 149.618,125.627 149.940 C 125.627 150.262,125.482 150.816,125.304 151.171 C 124.888 152.005,124.946 159.811,125.371 160.236 C 125.512 160.376,125.627 160.680,125.627 160.910 C 125.629 161.857,127.555 164.910,128.151 164.910 C 128.264 164.910,128.518 165.057,128.716 165.236 C 129.140 165.620,133.341 165.743,133.574 165.380 C 133.648 165.264,133.910 165.107,134.156 165.031 C 134.537 164.912,135.058 164.394,136.068 163.129 C 136.177 162.993,136.266 162.733,136.266 162.552 C 136.266 162.370,136.404 162.083,136.573 161.915 C 136.742 161.746,136.880 161.356,136.880 161.049 C 136.880 160.742,136.995 160.376,137.136 160.236 C 137.560 159.812,137.616 151.686,137.201 150.694 C 137.024 150.271,136.880 149.723,136.880 149.477 C 136.880 149.231,136.745 148.851,136.579 148.632 C 136.414 148.414,136.276 148.116,136.272 147.971 C 136.261 147.495,135.086 146.251,134.001 145.566 C 133.017 144.945,129.370 144.805,128.900 145.371 M197.107 145.371 C 197.042 145.540,196.838 145.678,196.654 145.678 C 196.173 145.678,194.373 147.704,194.373 148.245 C 194.373 148.493,194.235 148.811,194.066 148.951 C 193.898 149.091,193.760 149.499,193.760 149.856 C 193.760 150.214,193.660 150.606,193.538 150.728 C 192.839 151.427,193.366 161.120,194.144 161.899 C 194.270 162.025,194.373 162.296,194.373 162.503 C 194.373 162.709,194.512 162.930,194.680 162.995 C 194.849 163.060,194.987 163.230,194.987 163.374 C 194.987 163.700,196.207 164.910,196.536 164.910 C 196.669 164.910,196.885 165.039,197.015 165.196 C 197.541 165.829,201.739 165.932,201.739 165.312 C 201.739 165.219,201.940 165.079,202.184 165.001 C 202.718 164.832,203.990 163.636,203.990 163.304 C 203.990 163.175,204.064 163.069,204.155 163.069 C 204.335 163.069,204.734 162.151,205.303 160.424 C 205.805 158.902,205.823 151.430,205.327 150.673 C 205.154 150.409,205.013 149.919,205.013 149.584 C 205.013 149.250,204.921 148.919,204.808 148.849 C 204.696 148.780,204.604 148.551,204.604 148.340 C 204.604 148.130,204.465 147.820,204.297 147.651 C 204.128 147.482,203.990 147.266,203.990 147.170 C 203.990 146.969,203.505 146.536,202.317 145.675 C 201.316 144.950,197.357 144.719,197.107 145.371 M245.022 145.729 C 245.094 146.004,245.467 146.341,245.947 146.564 C 246.390 146.770,246.752 147.070,246.752 147.229 C 246.752 147.389,246.890 147.519,247.059 147.519 C 247.263 147.519,247.366 147.724,247.366 148.133 C 247.366 148.471,247.458 148.747,247.570 148.747 C 247.683 148.747,247.775 148.956,247.775 149.213 C 247.775 149.469,247.902 149.860,248.057 150.082 C 248.211 150.304,248.377 151.170,248.423 152.006 C 248.476 152.945,248.603 153.558,248.756 153.609 C 249.037 153.703,249.098 154.680,248.823 154.680 C 248.724 154.680,248.576 155.832,248.495 157.239 C 248.414 158.646,248.273 159.843,248.181 159.899 C 248.090 159.956,247.950 160.389,247.870 160.863 C 247.698 161.878,247.461 162.337,246.701 163.129 C 246.391 163.451,246.138 163.845,246.138 164.006 C 246.138 164.166,246.000 164.297,245.831 164.297 C 245.662 164.297,245.524 164.389,245.524 164.501 C 245.524 164.614,245.337 164.706,245.109 164.706 C 244.880 164.706,244.640 164.844,244.575 165.013 C 244.365 165.560,242.193 165.434,241.941 164.859 C 241.807 164.553,241.530 164.379,241.115 164.338 C 240.639 164.291,240.437 164.134,240.263 163.673 C 240.111 163.270,239.894 163.069,239.609 163.069 C 239.236 163.069,239.182 162.946,239.182 162.104 C 239.182 161.345,239.079 161.049,238.701 160.723 C 238.292 160.368,238.204 160.056,238.105 158.596 C 238.042 157.655,237.889 156.785,237.767 156.662 C 237.433 156.329,237.493 153.804,237.850 153.118 C 238.019 152.796,238.157 152.017,238.157 151.387 C 238.158 150.368,238.363 149.658,238.990 148.494 C 239.095 148.298,239.182 147.999,239.182 147.829 C 239.182 147.659,239.320 147.519,239.488 147.519 C 239.657 147.519,239.795 147.421,239.795 147.300 C 239.795 146.971,240.228 146.601,241.098 146.188 C 241.528 145.985,241.926 145.694,241.984 145.543 C 242.189 145.010,244.878 145.175,245.022 145.729 M288.381 145.755 C 288.670 146.023,289.182 146.297,289.520 146.364 C 289.925 146.445,290.202 146.664,290.331 147.003 C 290.439 147.287,290.621 147.519,290.737 147.519 C 290.852 147.519,290.946 147.657,290.946 147.826 C 290.946 147.995,291.038 148.133,291.151 148.133 C 291.263 148.133,291.355 148.346,291.355 148.605 C 291.355 148.865,291.491 149.257,291.656 149.475 C 291.821 149.693,291.959 150.312,291.963 150.850 C 291.967 151.527,292.064 151.865,292.276 151.946 C 292.722 152.117,292.716 158.273,292.270 158.863 C 292.104 159.081,291.969 159.610,291.969 160.039 C 291.969 160.468,291.881 160.818,291.774 160.818 C 291.667 160.818,291.514 161.162,291.436 161.581 C 291.357 162.001,291.083 162.508,290.826 162.710 C 290.570 162.912,290.331 163.282,290.295 163.532 C 290.251 163.837,289.928 164.134,289.309 164.435 C 288.803 164.682,288.278 164.982,288.142 165.102 C 287.644 165.540,285.974 165.356,285.452 164.805 C 285.187 164.525,284.841 164.297,284.684 164.297 C 284.526 164.297,284.397 164.091,284.393 163.836 C 284.390 163.523,284.128 163.215,283.575 162.874 C 283.106 162.585,282.762 162.214,282.762 161.998 C 282.762 161.793,282.624 161.571,282.455 161.506 C 282.271 161.436,282.148 161.127,282.148 160.735 C 282.148 160.376,282.053 159.986,281.936 159.869 C 281.409 159.342,281.884 150.131,282.483 149.264 C 282.637 149.042,282.762 148.559,282.762 148.190 C 282.762 147.730,282.859 147.519,283.069 147.519 C 283.238 147.519,283.376 147.381,283.376 147.212 C 283.376 147.043,283.514 146.905,283.683 146.905 C 283.852 146.905,283.990 146.815,283.990 146.705 C 283.990 146.594,284.220 146.446,284.501 146.376 C 284.783 146.305,285.013 146.165,285.013 146.065 C 285.013 145.964,285.151 145.882,285.320 145.882 C 285.488 145.882,285.627 145.744,285.627 145.575 C 285.627 145.024,287.741 145.162,288.381 145.755 M133.562 146.445 C 134.534 147.177,135.038 147.678,135.038 147.911 C 135.038 148.014,135.107 148.130,135.192 148.167 C 135.511 148.309,136.061 149.624,136.063 150.247 C 136.063 150.603,136.201 151.159,136.370 151.481 C 136.808 152.322,136.802 158.895,136.362 159.476 C 136.197 159.695,136.061 160.217,136.061 160.636 C 136.061 161.055,135.992 161.429,135.908 161.466 C 135.824 161.504,135.581 161.875,135.370 162.291 C 135.139 162.745,134.812 163.072,134.552 163.109 C 134.250 163.152,134.098 163.343,134.053 163.734 C 133.983 164.339,133.822 164.430,133.459 164.068 C 133.291 163.899,133.159 163.953,132.960 164.273 C 132.363 165.229,128.741 164.714,128.482 163.636 C 128.421 163.382,128.205 163.142,128.003 163.103 C 127.483 163.002,126.854 162.322,126.854 161.858 C 126.854 161.643,126.739 161.428,126.598 161.381 C 126.399 161.314,126.393 161.106,126.573 160.432 C 126.758 159.739,126.748 159.514,126.522 159.288 C 126.367 159.133,126.240 158.677,126.240 158.275 C 126.240 157.874,126.148 157.545,126.036 157.545 C 125.771 157.545,125.761 152.756,126.025 152.273 C 126.132 152.078,126.276 151.483,126.344 150.951 C 126.413 150.419,126.555 149.930,126.661 149.865 C 126.767 149.799,126.854 149.471,126.854 149.135 C 126.854 148.800,126.969 148.383,127.110 148.210 C 127.858 147.290,128.789 146.480,129.225 146.371 C 129.497 146.303,129.719 146.165,129.719 146.065 C 129.719 145.570,132.805 145.875,133.562 146.445 M200.597 146.061 C 200.658 146.159,200.992 146.296,201.339 146.365 C 202.154 146.528,203.141 147.520,203.305 148.342 C 203.385 148.742,203.617 149.070,203.917 149.206 C 204.325 149.393,204.399 149.575,204.399 150.404 C 204.399 150.942,204.491 151.439,204.604 151.509 C 204.728 151.586,204.808 153.114,204.808 155.408 C 204.808 157.787,204.733 159.182,204.604 159.182 C 204.491 159.182,204.399 159.688,204.399 160.307 C 204.399 161.171,204.328 161.432,204.092 161.432 C 203.918 161.432,203.785 161.616,203.785 161.856 C 203.785 162.092,203.422 162.606,202.967 163.015 C 202.517 163.419,202.148 163.873,202.148 164.023 C 202.148 164.177,201.929 164.297,201.649 164.297 C 201.374 164.297,201.093 164.389,201.023 164.501 C 200.953 164.614,200.119 164.706,199.170 164.706 C 198.155 164.706,197.442 164.622,197.442 164.501 C 197.442 164.389,197.304 164.297,197.136 164.297 C 196.967 164.297,196.829 164.121,196.829 163.906 C 196.829 163.526,195.760 162.455,195.381 162.455 C 195.277 162.455,195.192 162.276,195.192 162.056 C 195.192 161.837,195.057 161.582,194.892 161.489 C 194.643 161.350,194.246 154.836,194.358 152.737 C 194.430 151.385,194.661 149.958,194.888 149.463 C 195.042 149.125,195.289 148.550,195.435 148.184 C 195.581 147.818,195.817 147.519,195.958 147.519 C 196.099 147.519,196.215 147.381,196.215 147.212 C 196.215 147.043,196.311 146.905,196.428 146.905 C 196.546 146.905,196.890 146.675,197.194 146.394 C 197.762 145.866,200.323 145.616,200.597 146.061 M366.336 164.102 C 366.142 164.417,366.408 164.620,366.671 164.357 C 366.818 164.210,366.821 164.096,366.682 164.010 C 366.567 163.939,366.412 163.980,366.336 164.102 M148.474 173.640 C 148.192 173.923,148.354 174.278,148.806 174.364 C 149.473 174.492,149.770 174.347,149.770 173.896 C 149.770 173.504,148.801 173.313,148.474 173.640 M347.519 173.708 C 347.336 174.005,347.589 174.322,348.009 174.322 C 348.480 174.322,348.643 174.148,348.506 173.791 C 348.380 173.461,347.707 173.405,347.519 173.708 " stroke="none" fill="#97cc96" fill-rule="evenodd"></path>
                    <path id="path1" d="M194.578 19.977 C 192.419 20.158,190.796 20.402,190.077 20.655 C 189.458 20.873,188.286 21.286,187.472 21.574 C 186.658 21.862,185.645 22.098,185.221 22.098 C 184.793 22.098,184.132 22.294,183.734 22.538 C 182.967 23.008,180.268 24.371,178.396 25.234 C 177.767 25.524,177.143 25.893,177.008 26.055 C 176.874 26.217,176.468 26.467,176.106 26.611 C 175.097 27.011,173.104 28.309,173.099 28.569 C 173.097 28.696,172.749 29.060,172.327 29.378 C 170.882 30.465,169.587 31.612,168.324 32.925 C 167.628 33.647,166.668 34.642,166.189 35.134 C 165.711 35.626,165.320 36.116,165.320 36.223 C 165.320 36.329,165.043 36.662,164.706 36.963 C 164.368 37.264,164.092 37.641,164.092 37.801 C 164.092 37.962,163.678 38.495,163.171 38.988 C 162.665 39.480,162.251 39.996,162.251 40.136 C 162.251 40.451,159.892 45.106,159.324 45.912 C 159.094 46.238,158.834 46.965,158.745 47.528 C 158.656 48.090,158.409 48.745,158.197 48.981 C 157.838 49.381,157.540 50.286,157.228 51.923 C 157.136 52.407,157.219 52.793,157.527 53.316 C 157.762 53.713,157.954 54.218,157.954 54.436 C 157.954 54.982,157.203 54.960,157.028 54.409 C 156.704 53.388,156.182 55.243,156.130 57.599 C 156.108 58.583,156.015 59.790,155.923 60.283 C 155.675 61.611,155.655 64.966,155.885 66.598 C 155.996 67.386,156.194 69.090,156.325 70.384 C 156.472 71.828,156.709 73.026,156.939 73.486 C 157.146 73.898,157.374 74.589,157.447 75.020 C 157.653 76.248,158.362 78.320,158.896 79.253 C 159.163 79.720,159.383 80.240,159.385 80.409 C 159.394 81.215,159.885 82.336,160.510 82.979 C 160.890 83.371,161.397 84.215,161.637 84.857 C 162.097 86.085,163.600 88.345,164.530 89.207 C 164.834 89.488,165.164 90.038,165.263 90.428 C 165.399 90.960,165.668 91.268,166.341 91.661 C 166.918 91.999,167.290 92.383,167.386 92.742 C 167.564 93.409,171.348 97.172,172.315 97.644 C 172.688 97.826,173.342 98.126,173.770 98.311 C 174.275 98.530,174.662 98.889,174.876 99.337 C 175.137 99.885,175.361 100.052,175.969 100.155 C 176.401 100.228,176.942 100.511,177.216 100.808 C 177.481 101.095,178.251 101.597,178.926 101.922 C 179.601 102.248,180.844 102.868,181.688 103.301 C 182.532 103.734,183.637 104.204,184.143 104.344 C 185.047 104.596,186.124 104.949,188.927 105.911 C 189.701 106.176,190.809 106.394,191.388 106.394 C 191.984 106.394,192.628 106.525,192.871 106.695 C 193.558 107.176,203.300 107.237,204.706 106.770 C 205.269 106.583,206.702 106.382,207.891 106.323 C 209.528 106.242,210.373 106.092,211.370 105.703 C 212.093 105.420,213.376 104.944,214.220 104.643 C 216.441 103.853,217.289 103.487,217.289 103.319 C 217.289 103.139,218.175 102.784,219.048 102.612 C 219.397 102.544,219.994 102.166,220.375 101.773 C 220.814 101.320,221.452 100.946,222.115 100.753 C 222.691 100.586,223.377 100.220,223.640 99.940 C 223.903 99.660,224.538 99.192,225.052 98.900 C 225.565 98.607,226.362 97.987,226.823 97.522 C 227.285 97.056,228.038 96.427,228.497 96.125 C 228.956 95.822,229.718 95.085,230.189 94.488 C 230.661 93.890,231.289 93.242,231.585 93.048 C 232.258 92.605,234.066 90.434,234.066 90.068 C 234.066 89.919,234.470 89.430,234.963 88.981 C 235.501 88.491,236.005 87.781,236.224 87.203 C 236.424 86.673,236.922 85.904,237.329 85.493 C 237.823 84.995,238.160 84.398,238.337 83.708 C 238.483 83.137,238.779 82.446,238.995 82.172 C 239.210 81.899,239.387 81.505,239.388 81.298 C 239.388 81.090,239.575 80.645,239.802 80.307 C 240.377 79.454,240.890 78.272,241.314 76.829 C 241.512 76.153,241.769 75.371,241.884 75.090 C 242.364 73.923,242.504 73.218,242.777 70.588 C 242.936 69.069,243.161 67.320,243.279 66.701 C 243.905 63.413,242.867 54.707,241.352 50.537 C 241.045 49.693,240.659 48.542,240.494 47.980 C 240.329 47.417,240.104 46.796,239.994 46.600 C 239.206 45.195,238.363 43.513,238.363 43.346 C 238.363 42.893,237.477 41.125,237.250 41.125 C 236.735 41.125,235.093 38.656,235.087 37.872 C 235.086 37.692,234.598 37.038,234.005 36.419 C 233.411 35.801,232.575 34.811,232.148 34.220 C 231.721 33.629,231.311 33.146,231.236 33.146 C 231.161 33.145,230.636 32.700,230.069 32.157 C 229.502 31.613,228.530 30.843,227.908 30.445 C 227.287 30.048,226.494 29.363,226.145 28.923 C 225.797 28.483,225.192 27.941,224.801 27.719 C 223.150 26.780,222.025 26.048,220.870 25.160 C 220.120 24.583,219.244 24.116,218.619 23.960 C 218.056 23.819,217.182 23.454,216.675 23.148 C 216.169 22.842,215.202 22.424,214.527 22.218 C 213.852 22.011,212.989 21.712,212.609 21.552 C 212.229 21.392,211.308 21.182,210.563 21.086 C 209.817 20.989,208.471 20.719,207.570 20.485 C 204.428 19.670,200.221 19.505,194.578 19.977 M174.015 43.785 C 174.572 44.154,174.858 44.181,177.084 44.071 C 180.681 43.894,183.163 44.827,182.303 46.033 C 181.958 46.519,181.922 47.087,181.891 52.592 C 181.850 59.926,181.836 59.540,182.151 59.540 C 182.639 59.540,186.189 55.681,186.189 55.150 C 186.189 54.055,187.391 53.650,191.100 53.494 C 192.394 53.439,193.943 53.356,194.542 53.309 C 195.777 53.212,197.611 53.465,198.488 53.854 C 199.048 54.101,199.328 54.834,198.864 54.834 C 198.746 54.834,198.519 55.145,198.360 55.526 C 198.201 55.906,197.692 56.574,197.228 57.009 C 196.765 57.444,196.260 58.031,196.107 58.312 C 195.954 58.593,195.569 59.100,195.252 59.437 C 194.935 59.775,194.526 60.281,194.345 60.563 C 194.163 60.844,193.468 61.673,192.801 62.404 C 190.731 64.673,190.697 65.476,192.550 68.377 C 193.103 69.243,193.555 70.028,193.555 70.121 C 193.555 70.214,193.826 70.619,194.157 71.020 C 194.488 71.422,194.820 71.995,194.895 72.295 C 194.970 72.594,195.111 72.839,195.208 72.839 C 195.305 72.839,195.533 73.348,195.714 73.970 C 195.894 74.592,196.361 75.518,196.750 76.028 C 197.140 76.538,197.688 77.475,197.969 78.109 C 198.249 78.744,198.706 79.561,198.984 79.925 C 200.268 81.609,198.501 82.214,193.712 81.729 C 192.660 81.623,192.137 81.668,191.500 81.924 C 190.601 82.283,190.787 82.322,188.645 81.331 C 187.224 80.675,187.045 80.523,186.825 79.789 C 186.703 79.380,186.095 78.161,185.475 77.082 C 184.855 76.002,184.348 75.035,184.348 74.931 C 184.348 74.312,183.528 73.992,182.814 74.332 C 181.962 74.738,181.752 75.386,182.082 76.581 C 182.829 79.279,181.105 83.461,179.864 81.964 C 179.639 81.694,177.037 81.663,173.299 81.888 C 172.381 81.944,172.377 81.941,171.848 80.898 L 171.317 79.851 171.307 62.995 C 171.300 52.483,171.221 45.946,171.096 45.627 C 170.876 45.067,171.744 43.985,172.731 43.589 C 173.365 43.334,173.325 43.328,174.015 43.785 M208.593 44.321 C 211.125 44.728,211.356 44.901,210.852 46.018 C 210.545 46.700,210.520 46.982,210.703 47.703 C 210.824 48.179,210.869 48.655,210.804 48.760 C 210.739 48.865,210.655 50.110,210.617 51.526 C 210.529 54.866,210.709 54.999,213.544 53.683 L 215.141 52.942 218.414 52.890 C 222.346 52.827,221.935 52.674,224.556 55.181 C 225.121 55.722,225.931 56.437,226.355 56.770 C 226.844 57.154,227.358 57.867,227.756 58.714 C 228.101 59.449,228.610 60.525,228.886 61.105 C 229.933 63.301,230.144 71.956,229.188 73.503 C 228.945 73.896,228.747 74.488,228.747 74.819 C 228.747 75.414,228.436 75.850,225.979 78.704 C 224.872 79.989,222.528 81.583,221.007 82.085 C 218.946 82.765,214.104 82.433,213.027 81.538 C 211.947 80.640,211.603 80.549,210.884 80.969 C 209.645 81.692,207.573 82.121,206.556 81.865 C 205.432 81.582,203.918 81.574,202.940 81.846 C 202.062 82.089,200.470 81.530,200.216 80.889 C 200.134 80.682,200.080 75.816,200.098 70.077 C 200.115 64.338,200.128 59.481,200.127 59.284 C 200.126 58.907,200.138 56.932,200.150 55.806 C 200.159 54.940,200.129 46.996,200.112 45.934 C 200.085 44.119,200.122 44.099,203.533 44.042 C 205.542 44.009,207.229 44.102,208.593 44.321 M214.936 62.406 C 213.679 62.599,211.618 63.653,211.342 64.246 C 211.129 64.702,211.017 65.268,210.612 67.943 C 210.462 68.932,211.174 70.410,212.186 71.211 C 212.617 71.553,213.026 72.007,213.093 72.221 C 213.523 73.574,217.494 73.031,217.494 71.619 C 217.494 71.437,217.918 70.934,218.437 70.500 L 219.380 69.711 219.234 67.337 C 219.092 65.012,219.074 64.948,218.438 64.348 C 218.080 64.010,217.589 63.476,217.347 63.161 C 216.822 62.477,216.049 62.236,214.936 62.406 M212.010 102.957 C 211.819 103.147,211.710 103.147,211.519 102.957 C 211.328 102.766,211.383 102.711,211.765 102.711 C 212.147 102.711,212.201 102.766,212.010 102.957 M32.792 122.988 C 31.553 123.350,31.611 122.290,31.611 144.348 C 31.611 155.488,31.642 164.926,31.679 165.320 C 31.717 165.714,31.738 167.136,31.726 168.481 C 31.703 171.264,31.817 171.514,33.248 171.813 C 35.046 172.189,41.528 171.856,41.934 171.368 C 42.058 171.217,42.172 168.505,42.221 164.486 C 42.310 157.336,42.386 156.727,43.219 156.504 C 43.915 156.318,45.512 157.976,46.212 159.612 C 46.509 160.306,46.920 160.868,47.319 161.125 C 47.699 161.370,48.197 162.029,48.557 162.762 C 48.888 163.437,49.236 164.128,49.331 164.297 C 49.425 164.465,49.644 164.883,49.817 165.223 C 49.990 165.564,50.494 166.282,50.937 166.818 C 51.380 167.354,51.805 167.989,51.881 168.228 C 52.322 169.618,53.979 171.563,54.962 171.845 C 55.647 172.042,64.724 171.975,65.053 171.771 C 65.708 171.367,65.352 170.832,62.492 167.916 C 61.483 166.887,61.181 166.418,60.887 165.415 C 60.622 164.514,60.378 164.094,59.981 163.862 C 59.681 163.686,59.134 162.955,58.760 162.232 C 57.928 160.621,56.845 159.233,55.942 158.619 C 55.484 158.307,55.220 157.935,55.134 157.478 C 55.064 157.106,54.744 156.520,54.424 156.177 C 52.776 154.413,52.620 153.001,53.958 151.948 C 54.229 151.736,54.652 151.263,54.898 150.898 C 55.144 150.533,55.679 149.738,56.086 149.132 C 56.493 148.526,57.121 147.754,57.481 147.417 C 57.841 147.079,58.277 146.506,58.450 146.143 C 58.622 145.780,59.120 145.160,59.557 144.766 C 60.011 144.355,60.603 143.492,60.941 142.746 C 61.495 141.525,62.590 140.358,63.181 140.358 C 63.441 140.358,63.737 139.057,63.547 138.750 C 63.478 138.638,63.130 138.584,62.774 138.629 C 62.418 138.674,62.028 138.632,61.907 138.535 C 61.631 138.313,57.073 138.355,56.721 138.583 C 56.578 138.676,56.038 138.726,55.522 138.694 C 54.704 138.644,54.532 138.707,54.180 139.190 C 53.958 139.495,53.647 139.744,53.489 139.744 C 53.331 139.744,52.975 140.103,52.698 140.542 C 52.421 140.981,52.121 141.372,52.030 141.412 C 51.940 141.451,51.406 142.036,50.844 142.711 C 50.281 143.386,49.752 143.969,49.668 144.007 C 49.583 144.044,49.514 144.240,49.514 144.441 C 49.514 144.931,48.203 146.782,47.046 147.926 C 46.532 148.434,46.049 149.017,45.972 149.223 C 45.667 150.037,44.348 151.804,43.951 151.930 C 42.319 152.448,42.101 150.509,42.158 135.959 C 42.183 129.657,42.190 124.317,42.173 124.092 C 42.107 123.217,41.939 123.170,38.452 123.063 C 36.603 123.007,34.721 122.923,34.271 122.878 C 33.821 122.832,33.156 122.881,32.792 122.988 M138.229 123.298 C 138.154 123.493,138.097 127.419,138.103 132.023 C 138.116 142.959,137.909 143.640,135.309 141.215 C 134.226 140.205,132.488 139.071,131.560 138.770 C 131.166 138.642,130.370 138.366,129.790 138.156 C 128.966 137.858,128.474 137.807,127.539 137.924 C 126.881 138.006,125.560 138.082,124.604 138.093 C 122.849 138.114,122.678 138.167,121.194 139.159 C 120.750 139.456,119.898 139.870,119.300 140.080 C 117.793 140.608,116.432 142.138,115.164 144.731 C 114.620 145.843,114.094 146.856,113.995 146.983 C 113.896 147.109,113.757 147.874,113.685 148.683 C 113.613 149.492,113.461 150.399,113.347 150.699 C 112.503 152.919,112.406 157.082,113.147 159.343 C 113.357 159.986,113.585 161.018,113.653 161.637 C 113.952 164.349,113.998 164.526,114.570 165.177 C 114.888 165.539,115.441 166.411,115.798 167.114 C 116.202 167.909,116.662 168.504,117.015 168.686 C 117.327 168.848,117.988 169.485,118.484 170.103 C 119.496 171.364,119.738 171.489,122.046 171.943 C 122.946 172.120,124.373 172.417,125.217 172.603 C 126.640 172.916,126.856 172.916,128.184 172.606 C 128.972 172.422,129.941 172.272,130.338 172.274 C 131.287 172.277,134.522 170.192,135.220 169.128 C 135.489 168.718,135.947 168.323,136.237 168.250 C 136.527 168.177,136.945 167.948,137.167 167.742 C 137.795 167.157,138.038 167.281,138.604 168.479 C 138.894 169.092,139.223 169.650,139.335 169.719 C 139.448 169.788,139.540 170.147,139.540 170.517 C 139.540 171.881,140.854 172.056,147.688 171.600 C 148.063 171.576,148.452 171.407,148.553 171.226 C 148.832 170.727,148.823 124.021,148.544 123.685 C 147.998 123.027,138.470 122.669,138.229 123.298 M183.415 123.267 C 183.197 123.432,182.775 123.570,182.477 123.574 C 182.090 123.579,181.904 123.711,181.822 124.041 C 181.482 125.407,181.707 171.069,182.055 171.176 C 182.247 171.235,182.588 171.391,182.813 171.524 C 183.226 171.767,187.817 171.878,190.435 171.709 C 191.550 171.637,191.726 171.569,191.803 171.184 C 192.563 167.352,192.593 167.298,193.670 167.873 C 194.087 168.096,194.803 168.723,195.262 169.267 C 195.720 169.810,196.513 170.467,197.025 170.727 C 197.536 170.986,198.334 171.399,198.798 171.644 C 201.426 173.030,207.366 173.119,208.877 171.795 C 209.059 171.636,209.437 171.437,209.719 171.352 C 210.000 171.268,210.552 170.946,210.946 170.638 C 211.340 170.330,211.949 170.015,212.299 169.939 C 213.087 169.768,213.858 168.980,214.414 167.775 C 214.648 167.269,215.195 166.372,215.628 165.783 C 216.305 164.864,216.437 164.507,216.560 163.260 C 216.639 162.461,216.942 161.102,217.233 160.239 C 217.913 158.222,218.022 153.570,217.451 150.895 C 217.259 149.995,217.044 148.752,216.973 148.133 C 216.902 147.514,216.713 146.862,216.554 146.684 C 216.396 146.507,216.027 145.775,215.736 145.058 C 214.760 142.657,212.770 140.347,211.334 139.949 C 210.928 139.836,210.191 139.436,209.697 139.059 C 208.785 138.363,207.388 137.978,206.138 138.078 C 205.801 138.105,204.766 138.021,203.838 137.892 C 201.942 137.627,200.319 137.870,199.591 138.527 C 199.366 138.731,198.721 139.008,198.159 139.144 C 197.056 139.411,196.344 139.932,195.889 140.807 C 195.214 142.105,194.648 142.490,193.791 142.233 C 192.567 141.866,192.562 141.831,192.545 133.270 C 192.530 125.492,192.445 123.696,192.070 123.223 C 191.753 122.822,183.951 122.862,183.415 123.267 M315.499 123.157 L 314.783 123.274 314.587 124.808 C 314.319 126.912,314.319 168.753,314.587 170.230 C 314.754 171.151,314.859 171.344,315.165 171.291 C 315.371 171.255,315.719 171.389,315.939 171.588 C 316.181 171.807,316.638 171.943,317.095 171.933 C 317.511 171.923,318.358 171.922,318.977 171.930 C 321.020 171.959,323.983 171.871,324.419 171.770 C 324.954 171.646,325.109 169.787,325.216 162.251 C 325.283 157.514,325.442 156.113,325.915 156.113 C 326.497 156.113,328.631 158.586,329.114 159.819 C 329.413 160.581,329.955 161.456,330.429 161.939 C 330.873 162.392,331.513 163.315,331.852 163.990 C 332.191 164.665,332.693 165.458,332.968 165.752 C 333.243 166.046,333.659 166.707,333.894 167.221 C 334.128 167.735,334.599 168.462,334.941 168.835 C 335.282 169.209,335.748 169.898,335.975 170.367 C 336.717 171.898,336.332 171.821,343.802 171.919 C 348.128 171.975,348.498 171.874,347.572 170.888 C 347.285 170.582,346.843 169.844,346.590 169.248 C 346.259 168.467,345.885 167.994,345.255 167.561 C 344.640 167.138,344.338 166.762,344.236 166.293 C 344.061 165.486,343.150 164.142,342.670 163.982 C 342.479 163.918,342.101 163.388,341.832 162.803 C 341.562 162.218,341.028 161.353,340.645 160.882 C 340.262 160.410,339.719 159.699,339.437 159.300 C 339.156 158.902,338.779 158.527,338.599 158.466 C 338.420 158.405,338.147 157.966,337.993 157.490 C 337.839 157.014,337.461 156.394,337.152 156.113 C 335.645 154.740,335.726 152.495,337.343 150.860 C 337.992 150.204,338.640 149.402,338.783 149.078 C 338.927 148.754,339.503 148.076,340.063 147.572 C 340.624 147.068,341.409 146.164,341.808 145.562 C 342.207 144.961,342.712 144.412,342.930 144.343 C 343.148 144.274,343.561 143.720,343.849 143.112 C 344.137 142.504,344.652 141.751,344.995 141.438 C 346.162 140.373,346.394 140.077,346.387 139.655 C 346.378 139.074,345.862 138.441,345.508 138.577 C 345.347 138.639,345.123 138.596,345.009 138.482 C 344.868 138.341,344.662 138.348,344.372 138.504 C 343.863 138.776,342.852 138.834,341.986 138.641 C 339.986 138.196,337.939 138.356,337.259 139.011 C 336.898 139.358,336.231 139.949,335.777 140.324 C 335.033 140.938,333.095 143.583,333.095 143.984 C 333.095 144.072,332.456 144.855,331.675 145.722 C 330.895 146.590,330.106 147.618,329.922 148.005 C 329.457 148.985,326.594 152.020,326.135 152.020 C 325.055 152.020,324.359 150.056,324.807 148.271 C 325.096 147.116,325.123 145.718,325.024 136.854 C 324.962 131.298,324.914 126.087,324.917 125.275 C 324.927 122.948,324.968 122.968,320.158 123.008 C 317.989 123.026,315.893 123.093,315.499 123.157 M162.694 123.565 C 159.953 123.718,159.995 123.663,160.016 127.047 C 160.038 130.716,160.182 131.033,161.861 131.105 C 162.582 131.135,164.184 131.211,165.422 131.272 C 168.734 131.437,169.181 131.301,169.872 129.921 C 170.573 128.520,170.847 125.614,170.402 124.297 L 170.126 123.478 167.467 123.463 C 166.005 123.454,163.857 123.500,162.694 123.565 M286.343 137.836 C 284.395 137.923,281.555 138.318,281.431 138.519 C 281.375 138.609,280.846 138.748,280.256 138.828 C 279.336 138.952,277.392 139.682,276.166 140.365 C 275.971 140.474,275.728 140.563,275.627 140.563 C 275.115 140.563,271.925 144.034,271.208 145.371 C 270.786 146.159,270.372 146.849,270.289 146.905 C 269.965 147.125,269.712 147.879,269.570 149.054 C 269.488 149.729,269.343 150.429,269.247 150.609 C 268.888 151.282,268.440 154.016,268.447 155.499 C 268.454 156.951,268.670 158.064,269.643 161.637 C 269.872 162.481,270.106 163.402,270.163 163.683 C 270.332 164.524,274.362 169.207,274.916 169.207 C 275.055 169.207,275.289 169.372,275.436 169.574 C 275.583 169.776,276.164 170.114,276.726 170.324 C 277.289 170.534,278.110 170.932,278.551 171.208 C 282.427 173.638,293.046 173.091,297.711 170.222 C 298.435 169.777,299.139 169.412,299.273 169.412 C 299.538 169.412,300.422 168.310,300.628 167.724 C 300.698 167.527,300.938 167.366,301.162 167.366 C 301.727 167.366,302.404 166.580,302.404 165.926 C 302.404 165.583,302.665 165.114,303.112 164.654 C 303.501 164.253,303.879 163.664,303.953 163.344 C 304.026 163.024,304.319 161.980,304.604 161.023 C 305.407 158.326,305.592 156.447,305.305 153.897 C 304.815 149.543,304.163 146.701,303.652 146.701 C 303.341 146.701,302.407 145.156,302.358 144.560 C 302.329 144.216,302.065 143.754,301.721 143.444 C 301.397 143.154,300.751 142.533,300.285 142.064 C 299.819 141.596,299.023 141.009,298.517 140.759 C 298.010 140.509,297.353 140.134,297.057 139.925 C 296.760 139.716,296.024 139.441,295.420 139.314 C 294.246 139.067,293.745 138.789,293.930 138.489 C 293.993 138.387,293.785 138.315,293.467 138.329 C 293.150 138.343,292.384 138.260,291.765 138.144 C 290.332 137.876,288.175 137.754,286.343 137.836 M81.968 138.154 C 81.532 138.270,81.005 138.535,80.797 138.743 C 80.589 138.950,80.164 139.178,79.852 139.248 C 78.146 139.633,77.687 139.816,76.870 140.439 C 76.378 140.815,75.615 141.238,75.174 141.380 C 74.165 141.705,73.700 142.110,73.334 142.986 C 73.175 143.367,72.669 144.043,72.210 144.488 C 71.341 145.332,70.179 147.690,70.179 148.612 C 70.179 148.887,70.002 149.698,69.786 150.413 C 68.741 153.868,68.723 158.781,69.750 160.091 C 70.093 160.527,70.793 162.694,70.793 163.318 C 70.793 163.966,72.228 166.466,72.806 166.826 C 73.334 167.155,73.877 167.789,73.774 167.956 C 73.609 168.223,74.453 169.003,74.907 169.003 C 75.268 169.003,76.624 169.851,76.939 170.274 C 77.000 170.356,77.461 170.566,77.962 170.742 C 78.464 170.918,79.611 171.369,80.512 171.746 C 81.551 172.180,82.534 172.443,83.205 172.465 C 83.787 172.484,84.569 172.587,84.943 172.695 C 85.940 172.981,87.353 172.924,90.230 172.484 C 94.678 171.802,96.447 171.379,96.950 170.876 C 97.556 170.270,98.688 169.672,99.505 169.527 C 100.101 169.420,100.371 169.234,100.630 168.748 C 100.818 168.396,101.213 167.872,101.507 167.583 C 101.801 167.295,102.361 166.552,102.752 165.934 C 103.142 165.315,103.614 164.683,103.800 164.529 C 103.986 164.376,104.091 164.172,104.032 164.077 C 103.909 163.878,104.502 161.939,104.871 161.330 C 105.929 159.588,106.214 154.693,105.501 150.486 C 104.923 147.072,104.535 146.392,103.722 147.366 C 103.348 147.814,103.338 147.815,103.332 147.407 C 103.328 147.176,103.425 146.887,103.547 146.765 C 104.242 146.070,100.817 141.603,99.270 141.187 C 98.803 141.061,98.329 140.785,98.216 140.574 C 97.909 140.002,96.829 139.409,95.438 139.051 C 94.758 138.875,93.884 138.568,93.495 138.368 C 92.660 137.939,83.421 137.768,81.968 138.154 M237.749 138.136 C 237.355 138.244,236.889 138.501,236.713 138.707 C 236.537 138.913,235.985 139.149,235.486 139.231 C 234.187 139.445,233.424 139.800,232.222 140.750 C 231.641 141.210,230.976 141.586,230.744 141.586 C 230.321 141.586,228.142 143.732,228.136 144.155 C 228.134 144.274,227.681 145.012,227.130 145.795 C 226.403 146.827,226.084 147.500,225.974 148.239 C 225.891 148.799,225.649 149.857,225.437 150.588 C 224.532 153.711,224.709 159.073,225.793 161.330 C 226.063 161.893,226.381 162.743,226.499 163.219 C 226.618 163.695,226.883 164.175,227.088 164.285 C 227.293 164.395,227.578 164.900,227.720 165.409 C 227.896 166.038,228.199 166.501,228.670 166.860 C 229.050 167.149,229.361 167.523,229.361 167.690 C 229.361 168.310,230.015 168.992,230.742 169.128 C 231.142 169.203,231.800 169.561,232.205 169.923 C 232.676 170.345,233.641 170.823,234.885 171.251 C 235.954 171.619,236.956 172.021,237.112 172.146 C 237.796 172.692,246.916 172.702,248.506 172.158 C 249.303 171.885,250.104 171.662,250.287 171.662 C 251.376 171.662,252.796 171.152,253.516 170.502 C 253.947 170.113,254.649 169.699,255.078 169.583 C 255.948 169.346,256.573 168.876,256.573 168.457 C 256.573 168.305,256.861 167.882,257.212 167.517 C 257.564 167.153,258.084 166.486,258.368 166.036 C 258.651 165.586,259.100 164.998,259.365 164.729 C 259.673 164.417,259.847 164.000,259.847 163.573 C 259.847 163.206,260.167 162.076,260.558 161.063 C 261.608 158.345,262.126 153.630,261.503 152.466 C 261.299 152.086,261.028 150.643,260.726 148.338 C 260.658 147.816,260.397 147.166,260.124 146.839 C 259.859 146.520,259.642 146.145,259.642 146.005 C 259.642 145.864,259.424 145.544,259.157 145.294 C 258.891 145.043,258.467 144.439,258.216 143.951 C 257.582 142.717,256.331 141.596,255.215 141.260 C 254.699 141.105,253.923 140.659,253.492 140.270 C 252.754 139.603,252.087 139.326,250.424 138.997 C 250.036 138.920,249.627 138.746,249.514 138.611 C 248.946 137.926,239.851 137.560,237.749 138.136 M362.780 138.123 C 362.058 138.218,361.407 138.392,361.334 138.511 C 361.260 138.630,360.590 138.855,359.846 139.010 C 359.101 139.166,358.281 139.441,358.024 139.621 C 357.766 139.801,357.408 139.949,357.228 139.949 C 356.823 139.949,354.007 142.821,353.317 143.939 C 351.876 146.272,352.020 151.372,353.566 152.701 C 353.981 153.058,354.540 153.673,354.807 154.068 C 355.571 155.194,356.119 155.652,356.702 155.652 C 357.032 155.652,357.396 155.849,357.641 156.160 C 357.919 156.514,358.322 156.707,358.968 156.796 C 359.478 156.866,360.333 157.144,360.868 157.414 C 361.404 157.684,362.394 158.061,363.069 158.252 C 363.744 158.443,364.619 158.697,365.013 158.816 C 372.848 161.182,370.942 167.673,362.558 167.181 C 362.073 167.152,358.418 166.768,357.852 166.685 C 357.003 166.562,356.415 166.327,355.640 165.801 C 354.423 164.975,352.848 165.163,352.813 166.138 C 352.799 166.532,352.684 167.113,352.557 167.430 C 352.009 168.804,352.349 170.739,353.219 171.189 C 354.092 171.640,356.055 172.075,356.589 171.935 C 356.833 171.872,357.334 171.963,357.703 172.138 C 360.351 173.395,370.251 172.707,372.647 171.100 C 373.118 170.783,373.884 170.412,374.349 170.274 C 374.814 170.136,375.309 169.886,375.448 169.718 C 375.588 169.549,375.812 169.412,375.946 169.412 C 376.624 169.412,378.721 166.034,378.721 164.942 C 378.721 164.602,378.862 163.653,379.035 162.833 C 379.393 161.131,379.313 160.551,378.502 158.977 C 378.184 158.358,377.810 157.540,377.672 157.159 C 377.487 156.649,377.196 156.367,376.564 156.087 C 376.092 155.879,375.597 155.576,375.462 155.414 C 375.190 155.086,373.235 154.108,371.546 153.456 C 370.935 153.220,369.773 152.708,368.964 152.319 C 368.155 151.930,367.280 151.611,367.019 151.611 C 366.398 151.611,365.306 151.294,364.971 151.016 C 364.825 150.895,364.176 150.376,363.528 149.862 C 360.687 147.607,361.296 144.801,364.790 144.049 C 365.419 143.914,366.321 143.708,366.794 143.591 C 367.932 143.311,371.278 143.480,373.197 143.915 C 377.184 144.819,376.813 145.011,376.793 142.060 C 376.774 139.172,376.754 139.149,373.708 138.486 C 371.455 137.995,365.322 137.792,362.780 138.123 M160.522 138.630 C 159.712 139.235,159.510 170.999,160.313 171.589 C 160.740 171.902,165.759 172.114,168.184 171.920 L 170.128 171.765 170.374 171.049 C 170.717 170.047,170.702 141.043,170.357 139.488 L 170.119 138.414 165.520 138.373 C 161.767 138.340,160.847 138.387,160.522 138.630 M211.765 143.978 C 211.765 144.659,211.273 144.483,211.189 143.771 C 211.138 143.346,211.195 143.252,211.444 143.348 C 211.621 143.416,211.765 143.699,211.765 143.978 M89.573 144.076 C 91.560 144.875,92.644 146.084,93.303 148.235 C 93.441 148.685,93.685 149.203,93.844 149.386 C 94.633 150.289,94.566 161.170,93.765 162.185 C 93.515 162.503,93.124 163.176,92.897 163.683 C 92.239 165.153,92.206 165.191,91.085 165.743 C 88.707 166.914,85.324 166.902,83.818 165.718 C 83.539 165.499,83.234 165.318,83.139 165.317 C 82.528 165.305,82.063 164.307,81.119 160.983 C 80.500 158.804,80.371 152.476,80.909 150.663 C 81.071 150.115,81.390 148.940,81.618 148.052 C 82.016 146.496,82.639 145.473,83.188 145.473 C 83.326 145.473,83.826 145.150,84.298 144.756 C 85.115 144.073,85.349 143.969,86.547 143.758 C 87.255 143.634,88.906 143.807,89.573 144.076 M244.808 143.946 C 247.193 144.333,248.743 146.333,249.957 150.588 C 250.791 153.513,250.110 161.454,248.867 163.307 C 248.540 163.795,248.174 164.379,248.054 164.604 C 247.086 166.421,242.205 167.256,240.146 165.956 C 239.784 165.728,239.203 165.410,238.854 165.249 C 238.358 165.021,238.169 164.758,237.990 164.048 C 237.864 163.548,237.595 162.916,237.391 162.644 C 236.661 161.666,236.354 160.182,236.209 156.931 C 236.017 152.598,236.067 151.621,236.549 150.352 C 236.777 149.750,237.117 148.752,237.305 148.133 C 237.771 146.601,238.259 145.853,239.147 145.314 C 239.560 145.063,240.128 144.675,240.409 144.452 C 240.917 144.049,242.797 143.634,243.581 143.751 C 243.806 143.785,244.358 143.873,244.808 143.946 M289.614 144.046 C 290.951 144.449,291.702 145.451,293.212 148.849 C 294.286 151.267,294.078 159.924,292.887 162.401 C 292.474 163.259,292.087 164.265,292.027 164.637 C 291.745 166.370,286.541 167.530,284.363 166.345 C 283.989 166.141,283.385 165.817,283.021 165.625 C 281.748 164.953,279.934 160.070,279.905 157.238 C 279.867 153.349,280.334 149.572,280.953 148.770 C 281.160 148.502,281.331 148.134,281.333 147.952 C 281.336 147.581,281.757 146.326,282.011 145.930 C 282.102 145.788,282.484 145.543,282.861 145.385 C 283.238 145.228,283.795 144.820,284.098 144.479 C 284.870 143.613,287.492 143.407,289.614 144.046 M133.675 144.490 C 133.860 144.675,134.327 144.930,134.712 145.058 C 135.373 145.276,137.084 147.445,137.084 148.065 C 137.084 148.180,137.234 148.574,137.416 148.940 C 138.575 151.264,138.277 161.045,136.988 162.967 C 136.610 163.529,136.242 164.193,136.170 164.442 C 135.755 165.872,129.309 167.475,129.309 166.148 C 129.309 165.929,127.906 165.233,127.009 165.008 C 126.495 164.879,125.672 163.729,124.887 162.046 C 123.916 159.963,124.149 150.998,125.226 148.988 C 125.447 148.577,125.627 148.037,125.627 147.788 C 125.627 147.279,126.029 146.292,126.236 146.292 C 126.311 146.292,126.766 145.954,127.249 145.540 C 128.816 144.199,132.742 143.557,133.675 144.490 M200.479 144.337 C 201.080 144.497,201.694 144.581,201.844 144.523 C 202.351 144.329,205.217 146.650,205.217 147.255 C 205.217 147.397,205.493 148.341,205.829 149.354 C 206.687 151.937,206.981 156.163,206.441 158.148 C 206.240 158.885,206.010 160.087,205.930 160.818 C 205.788 162.111,205.494 162.926,204.914 163.641 C 204.759 163.833,204.401 164.273,204.118 164.619 C 203.830 164.972,203.244 165.356,202.782 165.494 C 202.329 165.630,201.815 165.945,201.640 166.195 C 201.114 166.946,197.895 166.875,197.175 166.098 C 196.894 165.795,196.339 165.410,195.940 165.244 C 195.526 165.071,195.002 164.607,194.714 164.159 C 194.437 163.728,194.029 163.225,193.805 163.041 C 193.501 162.790,193.339 162.253,193.157 160.893 C 193.024 159.895,192.860 158.849,192.793 158.568 C 192.378 156.820,192.516 151.533,193.017 149.981 C 193.295 149.119,193.586 148.071,193.665 147.651 C 193.810 146.880,194.674 146.134,196.804 144.940 C 197.185 144.727,197.691 144.439,197.930 144.300 C 198.494 143.971,199.139 143.980,200.479 144.337 " stroke="none" fill="#4eb84b" fill-rule="evenodd"></path>
                    <path id="path2" d="M195.558 19.040 C 195.365 19.152,194.444 19.295,193.512 19.357 C 192.579 19.419,191.632 19.550,191.407 19.650 C 191.182 19.749,190.767 19.867,190.486 19.912 C 190.205 19.958,190.393 20.008,190.905 20.023 C 191.417 20.039,191.924 19.967,192.031 19.865 C 192.594 19.324,199.929 19.124,204.092 19.535 C 207.605 19.882,209.304 20.031,208.338 19.907 C 207.972 19.860,207.673 19.749,207.673 19.660 C 207.673 19.570,206.807 19.446,205.748 19.383 C 204.690 19.320,203.637 19.168,203.409 19.046 C 202.879 18.762,196.043 18.758,195.558 19.040 M188.747 20.256 C 188.677 20.368,188.327 20.461,187.967 20.462 C 187.608 20.462,187.051 20.600,186.729 20.769 C 186.406 20.937,185.946 21.077,185.706 21.081 C 185.465 21.084,185.090 21.222,184.871 21.388 C 184.653 21.553,184.315 21.688,184.121 21.688 C 183.926 21.688,183.507 21.818,183.188 21.976 C 182.869 22.134,182.356 22.380,182.046 22.522 C 181.737 22.664,181.530 22.826,181.586 22.882 C 181.643 22.938,181.942 22.867,182.251 22.724 C 183.619 22.090,184.132 21.897,185.575 21.474 C 186.419 21.227,187.197 20.944,187.304 20.845 C 187.411 20.746,187.826 20.662,188.225 20.658 C 188.625 20.655,189.130 20.517,189.349 20.352 C 189.738 20.057,189.737 20.051,189.309 20.051 C 189.070 20.051,188.816 20.143,188.747 20.256 M209.719 20.358 C 210.000 20.519,210.448 20.654,210.714 20.658 C 211.339 20.667,214.330 21.621,215.291 22.118 C 215.487 22.219,215.753 22.302,215.883 22.302 C 216.114 22.302,219.748 23.960,220.358 24.344 C 220.527 24.450,221.056 24.741,221.535 24.990 C 222.013 25.239,222.404 25.519,222.404 25.612 C 222.404 25.704,222.541 25.780,222.709 25.780 C 222.971 25.780,225.157 27.163,225.930 27.819 C 226.073 27.940,226.419 28.226,226.701 28.455 C 228.346 29.795,228.987 30.375,230.868 32.225 C 232.013 33.350,233.224 34.625,233.559 35.057 C 233.894 35.489,234.466 36.180,234.829 36.592 C 235.192 37.003,235.491 37.448,235.494 37.579 C 235.497 37.710,235.568 37.848,235.652 37.886 C 235.892 37.992,238.050 41.165,238.273 41.739 C 238.339 41.908,238.476 42.184,238.579 42.353 C 238.951 42.967,239.591 44.382,239.591 44.592 C 239.591 44.711,239.683 44.808,239.795 44.808 C 239.908 44.808,240.000 44.986,240.000 45.203 C 240.000 45.420,240.138 45.735,240.307 45.904 C 240.476 46.073,240.614 46.365,240.614 46.552 C 240.614 46.740,240.742 47.138,240.898 47.436 C 241.151 47.920,241.809 49.942,242.472 52.276 C 242.600 52.726,242.773 53.555,242.857 54.118 C 242.941 54.680,243.112 55.555,243.237 56.061 C 244.034 59.286,243.922 69.813,243.074 71.398 C 242.959 71.613,242.864 72.204,242.864 72.711 C 242.864 73.218,242.778 73.687,242.672 73.752 C 242.566 73.818,242.416 74.307,242.339 74.839 C 242.262 75.370,242.127 75.898,242.039 76.010 C 241.950 76.123,241.813 76.561,241.734 76.984 C 241.655 77.408,241.509 77.804,241.409 77.866 C 241.309 77.928,241.228 78.149,241.228 78.359 C 241.228 78.568,241.094 79.000,240.930 79.318 C 240.767 79.637,240.352 80.519,240.009 81.279 C 238.800 83.958,237.824 85.875,237.534 86.138 C 237.473 86.194,237.114 86.747,236.739 87.366 C 236.030 88.534,234.523 90.571,233.714 91.456 C 233.458 91.736,233.248 92.036,233.248 92.123 C 233.248 92.348,229.857 95.699,228.641 96.675 C 228.080 97.125,227.575 97.546,227.519 97.610 C 227.143 98.038,222.468 101.279,222.226 101.279 C 222.115 101.279,221.902 101.394,221.754 101.536 C 221.529 101.749,218.870 103.109,216.899 104.018 C 216.467 104.218,216.454 104.255,216.789 104.320 C 216.999 104.361,217.205 104.292,217.247 104.167 C 217.289 104.041,217.432 103.939,217.565 103.939 C 217.698 103.939,218.150 103.754,218.570 103.529 C 218.990 103.304,219.472 103.120,219.641 103.120 C 219.810 103.120,219.949 103.028,219.949 102.916 C 219.949 102.803,220.076 102.711,220.231 102.711 C 220.386 102.711,220.627 102.573,220.767 102.404 C 220.907 102.235,221.185 102.097,221.384 102.097 C 221.583 102.097,221.799 101.959,221.864 101.790 C 221.929 101.621,222.169 101.483,222.398 101.483 C 222.626 101.483,222.813 101.412,222.813 101.325 C 222.813 101.238,223.156 100.985,223.574 100.763 C 224.258 100.399,227.471 98.121,227.724 97.820 C 227.780 97.753,228.242 97.364,228.751 96.956 C 229.800 96.113,233.193 92.735,233.657 92.070 C 233.970 91.622,234.700 90.713,235.345 89.967 C 235.542 89.740,235.703 89.430,235.703 89.278 C 235.703 89.127,235.788 89.003,235.891 89.003 C 236.115 89.003,238.853 84.605,239.079 83.882 C 239.166 83.604,239.293 83.330,239.363 83.274 C 239.490 83.170,240.002 82.129,240.570 80.818 C 240.741 80.425,241.005 79.858,241.156 79.559 C 241.308 79.261,241.432 78.829,241.432 78.599 C 241.432 78.370,241.524 78.126,241.637 78.056 C 241.749 77.987,241.841 77.742,241.841 77.512 C 241.841 77.283,241.971 76.805,242.130 76.450 C 242.289 76.096,242.478 75.460,242.549 75.038 C 242.620 74.616,242.766 74.271,242.874 74.271 C 242.981 74.271,243.072 73.788,243.076 73.197 C 243.079 72.579,243.210 71.954,243.382 71.726 C 243.584 71.460,243.683 70.830,243.683 69.820 C 243.683 68.990,243.791 68.110,243.924 67.864 C 244.238 67.281,244.220 59.343,243.903 58.750 C 243.782 58.524,243.683 57.654,243.683 56.816 C 243.683 55.712,243.598 55.223,243.376 55.038 C 243.187 54.881,243.066 54.421,243.062 53.837 C 243.058 53.316,242.923 52.660,242.762 52.379 C 242.601 52.097,242.466 51.624,242.462 51.328 C 242.459 51.031,242.318 50.525,242.150 50.202 C 241.981 49.880,241.843 49.409,241.843 49.156 C 241.842 48.903,241.749 48.696,241.637 48.696 C 241.524 48.696,241.432 48.426,241.432 48.096 C 241.432 47.767,241.294 47.359,241.125 47.190 C 240.957 47.022,240.818 46.644,240.818 46.351 C 240.818 46.058,240.680 45.765,240.512 45.701 C 240.343 45.636,240.205 45.374,240.205 45.118 C 240.205 44.863,240.066 44.539,239.898 44.399 C 239.729 44.259,239.591 43.979,239.591 43.777 C 239.591 43.575,239.522 43.379,239.437 43.342 C 239.213 43.242,238.568 41.960,238.568 41.614 C 238.568 41.451,238.430 41.264,238.261 41.199 C 238.092 41.135,237.954 40.944,237.954 40.775 C 237.954 40.606,237.678 40.119,237.340 39.693 C 237.003 39.267,236.726 38.826,236.726 38.714 C 236.726 38.601,236.588 38.456,236.419 38.391 C 236.251 38.327,236.113 38.133,236.113 37.960 C 236.113 37.788,236.020 37.647,235.908 37.647 C 235.795 37.647,235.701 37.532,235.699 37.391 C 235.696 37.251,235.397 36.805,235.034 36.401 C 234.670 35.997,234.055 35.260,233.665 34.764 C 232.882 33.767,228.796 29.670,228.578 29.663 C 228.502 29.661,227.980 29.248,227.417 28.746 C 225.987 27.471,225.920 27.417,225.738 27.414 C 225.648 27.412,225.264 27.136,224.883 26.800 C 224.502 26.464,224.064 26.189,223.911 26.189 C 223.757 26.189,223.632 26.099,223.632 25.989 C 223.632 25.878,223.402 25.730,223.120 25.659 C 222.839 25.589,222.609 25.449,222.609 25.349 C 222.609 25.248,222.482 25.166,222.327 25.166 C 222.172 25.166,221.930 25.028,221.790 24.859 C 221.650 24.691,221.363 24.552,221.151 24.552 C 220.940 24.552,220.767 24.463,220.767 24.353 C 220.767 24.151,219.131 23.325,218.732 23.325 C 218.614 23.325,218.517 23.233,218.517 23.120 C 218.517 23.008,218.353 22.916,218.153 22.916 C 217.953 22.916,217.608 22.789,217.386 22.635 C 217.164 22.480,216.683 22.289,216.317 22.209 C 215.951 22.130,215.652 21.980,215.652 21.876 C 215.652 21.773,215.373 21.688,215.032 21.688 C 214.669 21.688,214.363 21.560,214.294 21.381 C 214.228 21.210,213.924 21.074,213.608 21.074 C 213.295 21.074,212.775 20.937,212.453 20.769 C 212.131 20.600,211.573 20.462,211.214 20.462 C 210.855 20.461,210.504 20.368,210.435 20.256 C 210.365 20.143,210.061 20.054,209.758 20.058 L 209.207 20.066 209.719 20.358 M180.631 23.069 C 180.517 23.325,179.226 23.939,178.801 23.939 C 178.581 23.939,178.348 24.077,178.284 24.246 C 178.219 24.414,178.085 24.552,177.986 24.552 C 177.742 24.552,175.669 25.826,175.584 26.028 C 175.546 26.117,175.422 26.189,175.307 26.189 C 175.191 26.189,174.749 26.465,174.322 26.803 C 173.896 27.141,173.455 27.417,173.343 27.417 C 173.230 27.417,173.086 27.554,173.021 27.722 C 172.941 27.931,173.152 27.870,173.693 27.529 C 174.745 26.865,176.445 25.706,176.573 25.565 C 176.629 25.504,177.670 24.957,178.886 24.351 C 181.079 23.257,181.583 22.916,181.001 22.916 C 180.835 22.916,180.668 22.985,180.631 23.069 M172.259 28.293 C 169.934 30.079,165.788 34.193,164.872 35.623 C 164.683 35.917,164.378 36.308,164.194 36.493 C 164.009 36.678,163.940 36.829,164.039 36.829 C 164.138 36.829,164.440 36.529,164.709 36.164 C 164.979 35.798,165.295 35.372,165.413 35.217 C 166.007 34.434,171.054 29.497,171.713 29.054 C 172.132 28.772,172.519 28.427,172.573 28.286 C 172.694 27.976,172.671 27.976,172.259 28.293 M163.214 37.711 C 162.909 38.111,162.660 38.536,162.660 38.656 C 162.660 38.776,162.565 38.875,162.450 38.875 C 162.335 38.875,162.151 39.082,162.041 39.335 C 161.836 39.809,161.408 40.536,161.227 40.716 C 161.171 40.772,160.914 41.233,160.657 41.739 C 160.228 42.583,160.054 42.907,159.557 43.785 C 159.462 43.954,159.331 44.230,159.267 44.399 C 159.202 44.568,159.019 44.950,158.859 45.249 C 158.699 45.548,158.568 45.939,158.568 46.119 C 158.568 46.298,158.486 46.445,158.386 46.445 C 158.286 46.445,158.144 46.767,158.070 47.161 C 157.996 47.555,157.848 47.877,157.740 47.877 C 157.633 47.877,157.545 48.147,157.545 48.476 C 157.545 48.806,157.407 49.214,157.238 49.383 C 157.069 49.551,156.931 50.007,156.931 50.395 C 156.931 50.783,156.793 51.215,156.624 51.355 C 156.438 51.510,156.317 51.958,156.317 52.494 C 156.317 52.980,156.234 53.428,156.133 53.491 C 156.032 53.553,155.884 54.272,155.804 55.089 C 155.724 55.905,155.580 56.670,155.484 56.788 C 155.389 56.907,155.268 59.116,155.215 61.699 L 155.120 66.394 155.293 62.506 C 155.388 60.368,155.562 58.113,155.680 57.494 C 155.798 56.875,155.950 55.840,156.018 55.195 C 156.086 54.550,156.227 53.969,156.331 53.904 C 156.436 53.840,156.522 53.389,156.522 52.903 C 156.522 52.367,156.643 51.919,156.829 51.765 C 156.997 51.625,157.136 51.204,157.136 50.831 C 157.136 50.458,157.217 50.102,157.317 50.040 C 157.417 49.978,157.561 49.593,157.638 49.184 C 157.715 48.775,157.850 48.291,157.938 48.108 C 158.095 47.782,158.527 46.802,159.100 45.473 C 159.631 44.241,160.102 43.274,160.221 43.171 C 160.286 43.115,160.561 42.609,160.830 42.046 C 161.417 40.823,162.869 38.548,163.479 37.896 C 163.720 37.638,163.883 37.328,163.843 37.206 C 163.802 37.084,163.519 37.311,163.214 37.711 M172.003 44.740 C 171.737 45.006,171.845 80.919,172.113 81.187 C 172.288 81.362,173.592 81.432,176.684 81.432 C 182.099 81.432,181.688 81.734,181.688 77.763 L 181.688 74.841 182.348 73.994 C 182.710 73.527,183.102 73.070,183.217 72.977 C 183.345 72.874,183.307 72.840,183.120 72.891 C 182.951 72.936,182.514 73.365,182.148 73.843 L 181.483 74.712 181.483 77.558 C 181.483 81.495,181.831 81.228,176.717 81.228 C 173.463 81.228,172.598 81.169,172.363 80.934 C 172.112 80.683,172.077 78.067,172.122 62.776 L 172.174 44.910 176.596 44.855 C 180.122 44.812,181.064 44.857,181.248 45.078 C 181.409 45.272,181.495 47.865,181.532 53.624 C 181.591 62.753,181.557 62.561,182.841 60.870 C 183.269 60.307,183.692 59.754,183.782 59.642 C 184.277 59.025,184.843 58.350,185.283 57.853 C 185.556 57.545,185.780 57.200,185.780 57.086 C 185.780 56.973,185.849 56.879,185.934 56.878 C 186.018 56.878,186.317 56.532,186.598 56.111 C 188.001 54.010,187.974 54.018,193.387 54.017 C 198.325 54.015,198.732 54.107,197.915 55.038 C 197.767 55.207,197.318 55.760,196.917 56.266 C 196.516 56.772,195.790 57.647,195.304 58.210 C 194.818 58.772,193.792 60.015,193.025 60.972 C 192.257 61.928,191.556 62.742,191.467 62.779 C 191.378 62.817,191.304 62.929,191.304 63.028 C 191.304 63.127,191.028 63.491,190.691 63.836 C 190.002 64.541,189.871 65.532,190.377 66.201 C 190.542 66.420,190.680 66.714,190.684 66.856 C 190.688 66.998,190.967 67.495,191.304 67.961 C 191.642 68.427,191.918 68.932,191.918 69.084 C 191.918 69.236,192.008 69.361,192.119 69.361 C 192.229 69.361,192.377 69.591,192.448 69.872 C 192.519 70.153,192.648 70.384,192.737 70.384 C 192.825 70.384,192.955 70.614,193.025 70.895 C 193.096 71.176,193.244 71.407,193.354 71.407 C 193.465 71.407,193.555 71.594,193.555 71.822 C 193.555 72.051,193.693 72.291,193.862 72.356 C 194.031 72.420,194.169 72.636,194.169 72.836 C 194.169 73.035,194.307 73.313,194.476 73.453 C 194.645 73.593,194.783 73.823,194.783 73.964 C 194.783 74.105,194.921 74.336,195.090 74.476 C 195.534 74.844,195.468 74.581,194.885 73.657 C 194.604 73.212,194.373 72.707,194.373 72.536 C 194.373 72.365,194.290 72.225,194.187 72.225 C 194.085 72.225,193.790 71.788,193.533 71.253 C 193.275 70.719,192.945 70.160,192.798 70.011 C 192.652 69.862,192.532 69.609,192.532 69.448 C 192.532 69.288,192.463 69.156,192.379 69.155 C 192.294 69.155,192.058 68.748,191.854 68.251 C 191.649 67.755,191.350 67.297,191.189 67.235 C 191.027 67.174,190.892 66.959,190.889 66.758 C 190.885 66.558,190.747 66.215,190.582 65.997 C 190.114 65.378,190.219 64.593,190.860 63.926 C 191.178 63.595,191.882 62.772,192.424 62.097 C 192.967 61.422,193.469 60.824,193.539 60.767 C 193.610 60.711,193.985 60.251,194.372 59.744 C 195.167 58.703,195.363 58.468,196.800 56.840 C 199.477 53.804,199.485 53.811,193.262 53.811 C 187.580 53.811,187.794 53.750,186.517 55.723 C 186.142 56.303,185.661 56.973,185.449 57.212 C 184.711 58.045,183.014 60.208,182.484 60.991 C 181.684 62.176,181.679 62.128,181.693 53.316 C 181.705 45.768,181.678 45.102,181.351 44.863 C 180.971 44.585,172.273 44.471,172.003 44.740 M200.767 44.739 C 200.270 44.940,200.408 80.953,200.907 81.220 C 201.143 81.347,202.997 81.432,205.496 81.432 C 210.166 81.432,210.332 81.386,210.332 80.100 C 210.332 79.171,210.533 79.107,211.311 79.786 C 211.944 80.338,213.330 81.071,214.834 81.646 C 215.952 82.075,219.372 82.143,220.128 81.752 C 220.468 81.576,220.982 81.432,221.269 81.432 C 221.556 81.432,221.790 81.346,221.790 81.241 C 221.790 81.136,221.997 80.987,222.251 80.910 C 223.351 80.572,225.498 78.911,226.287 77.785 C 226.734 77.146,227.172 76.529,227.259 76.414 C 227.420 76.200,227.897 75.217,228.425 74.015 C 229.426 71.734,229.817 65.120,229.058 63.303 C 228.887 62.894,228.747 62.357,228.747 62.110 C 228.747 59.585,223.247 53.810,220.842 53.811 C 220.601 53.811,220.141 53.673,219.819 53.505 C 219.033 53.095,216.363 53.095,215.578 53.505 C 215.255 53.673,214.837 53.811,214.649 53.811 C 213.952 53.811,212.003 55.013,211.095 56.003 C 210.386 56.777,210.332 56.401,210.332 50.635 C 210.332 45.300,210.313 45.017,209.937 44.815 C 209.539 44.603,201.276 44.534,200.767 44.739 M209.916 45.204 C 210.046 45.447,210.129 47.638,210.131 50.882 C 210.135 57.123,210.106 57.031,211.643 55.779 C 212.985 54.686,214.276 54.015,215.038 54.015 C 215.333 54.015,215.753 53.880,215.971 53.715 C 216.495 53.319,218.850 53.314,219.540 53.708 C 219.821 53.869,220.345 54.004,220.704 54.008 C 221.063 54.012,221.409 54.100,221.474 54.204 C 221.538 54.308,221.866 54.454,222.202 54.527 C 222.538 54.601,222.813 54.746,222.813 54.850 C 222.813 54.954,222.915 55.038,223.040 55.038 C 223.768 55.038,226.291 57.574,227.146 59.165 C 227.407 59.653,227.691 60.082,227.775 60.119 C 227.859 60.157,227.928 60.392,227.928 60.643 C 227.928 60.893,228.064 61.277,228.229 61.495 C 228.394 61.714,228.532 62.273,228.536 62.737 C 228.539 63.231,228.670 63.687,228.849 63.836 C 229.295 64.206,229.301 70.933,228.856 71.521 C 228.690 71.739,228.552 72.252,228.549 72.660 C 228.545 73.069,228.404 73.517,228.235 73.657 C 228.066 73.797,227.928 74.177,227.928 74.501 C 227.928 74.825,227.836 75.090,227.724 75.090 C 227.611 75.090,227.519 75.221,227.519 75.382 C 227.519 75.543,227.399 75.796,227.252 75.944 C 227.105 76.093,226.921 76.353,226.844 76.522 C 226.286 77.740,224.205 79.785,223.171 80.132 C 222.974 80.198,222.813 80.326,222.813 80.417 C 222.813 80.507,222.537 80.642,222.199 80.716 C 221.862 80.790,221.586 80.936,221.586 81.039 C 221.586 81.143,221.281 81.228,220.909 81.228 C 220.536 81.228,220.053 81.363,219.835 81.528 C 219.297 81.934,216.359 81.939,215.652 81.535 C 215.371 81.374,214.936 81.239,214.685 81.235 C 214.119 81.226,212.127 80.164,211.392 79.479 C 210.634 78.774,210.245 78.903,210.164 79.888 C 210.128 80.336,209.946 80.808,209.755 80.954 C 209.255 81.334,201.577 81.324,201.074 80.943 C 200.618 80.596,200.508 45.508,200.962 45.054 C 201.434 44.581,209.657 44.719,209.916 45.204 M214.220 61.802 C 212.416 62.027,210.586 63.595,210.239 65.215 C 210.160 65.579,210.011 65.930,209.908 65.994 C 209.652 66.152,209.666 69.099,209.923 69.258 C 210.036 69.328,210.128 69.527,210.128 69.700 C 210.128 73.161,215.651 74.853,218.325 72.212 C 218.993 71.552,219.540 70.836,219.540 70.621 C 219.540 70.405,219.678 70.115,219.847 69.974 C 220.082 69.779,220.153 69.244,220.153 67.684 C 220.153 66.148,220.078 65.573,219.847 65.342 C 219.678 65.173,219.540 64.865,219.540 64.656 C 219.540 63.092,216.587 61.508,214.220 61.802 M217.040 62.333 C 217.798 62.794,219.331 64.482,219.334 64.859 C 219.336 65.028,219.475 65.430,219.643 65.752 C 220.039 66.511,220.035 68.451,219.635 69.591 C 219.064 71.217,218.877 71.501,217.799 72.379 L 216.732 73.248 214.897 73.248 L 213.063 73.248 212.140 72.379 C 209.903 70.271,209.353 67.052,210.800 64.528 C 211.241 63.759,212.316 62.656,212.762 62.514 C 213.001 62.439,213.197 62.291,213.197 62.186 C 213.197 61.837,216.429 61.961,217.040 62.333 M155.327 68.070 C 155.309 68.992,155.380 69.799,155.485 69.864 C 155.590 69.929,155.740 70.719,155.819 71.619 C 155.897 72.520,156.042 73.307,156.139 73.367 C 156.237 73.427,156.320 73.817,156.324 74.232 C 156.327 74.647,156.465 75.166,156.631 75.384 C 156.796 75.603,156.934 76.017,156.937 76.305 C 156.941 76.593,157.079 77.007,157.244 77.226 C 157.410 77.444,157.545 77.779,157.545 77.970 C 157.545 78.160,157.682 78.580,157.850 78.902 C 158.123 79.426,158.156 79.441,158.157 79.040 C 158.158 78.794,158.066 78.535,157.954 78.465 C 157.841 78.396,157.749 78.137,157.748 77.891 C 157.747 77.644,157.609 77.179,157.441 76.856 C 157.273 76.534,157.136 76.134,157.136 75.967 C 157.136 75.800,157.011 75.373,156.858 75.018 C 156.532 74.260,155.626 69.254,155.426 67.110 C 155.390 66.716,155.345 67.148,155.327 68.070 M184.256 73.964 C 184.668 74.752,185.107 75.521,185.231 75.674 C 185.507 76.013,185.925 76.721,186.094 77.136 C 186.162 77.304,186.304 77.581,186.409 77.749 C 186.514 77.918,186.686 78.254,186.791 78.497 C 186.896 78.739,187.092 79.005,187.226 79.088 C 187.360 79.171,187.429 79.157,187.379 79.057 C 187.329 78.957,187.170 78.575,187.025 78.210 C 186.881 77.844,186.680 77.545,186.578 77.545 C 186.477 77.545,186.394 77.366,186.394 77.148 C 186.394 76.929,186.296 76.690,186.177 76.616 C 186.057 76.542,185.869 76.284,185.759 76.042 C 185.448 75.359,185.032 74.669,184.781 74.418 C 184.655 74.292,184.552 74.066,184.552 73.914 C 184.552 73.763,184.317 73.390,184.029 73.086 C 183.568 72.597,183.595 72.701,184.256 73.964 M195.396 74.966 C 195.396 75.039,195.610 75.441,195.872 75.861 C 196.133 76.281,196.409 76.762,196.484 76.931 C 196.615 77.224,196.777 77.519,197.244 78.312 C 197.360 78.509,197.508 78.831,197.575 79.028 C 197.641 79.225,197.770 79.386,197.862 79.386 C 197.954 79.386,198.093 79.593,198.172 79.847 C 198.251 80.100,198.419 80.375,198.544 80.457 C 198.705 80.563,198.696 80.608,198.517 80.611 C 198.376 80.612,198.261 80.752,198.261 80.921 C 198.261 81.185,197.622 81.227,193.708 81.221 C 188.731 81.213,188.800 81.229,187.963 79.931 C 187.757 79.612,187.543 79.397,187.486 79.453 C 187.350 79.589,188.029 80.627,188.542 81.067 C 189.116 81.560,198.262 81.617,198.666 81.130 C 198.936 80.805,198.684 80.167,197.450 78.056 C 197.121 77.494,196.644 76.638,196.390 76.155 C 195.962 75.340,195.396 74.663,195.396 74.966 M158.159 79.883 C 158.159 80.060,158.251 80.205,158.363 80.205 C 158.476 80.205,158.568 80.352,158.568 80.531 C 158.568 80.711,158.695 81.102,158.852 81.401 C 159.008 81.699,159.411 82.496,159.748 83.171 C 160.666 85.009,161.097 85.782,161.381 86.092 C 161.522 86.246,161.637 86.503,161.637 86.664 C 161.637 86.825,161.729 86.957,161.841 86.957 C 161.954 86.957,162.046 87.053,162.046 87.170 C 162.046 87.401,163.631 89.616,163.796 89.616 C 163.905 89.616,163.264 88.558,163.054 88.389 C 162.984 88.332,162.673 87.826,162.364 87.263 C 162.054 86.701,161.687 86.102,161.548 85.934 C 161.409 85.765,161.108 85.258,160.878 84.808 C 160.648 84.358,160.219 83.539,159.923 82.987 C 159.628 82.436,159.386 81.872,159.386 81.734 C 159.386 81.595,159.248 81.368,159.079 81.228 C 158.910 81.088,158.772 80.793,158.772 80.574 C 158.772 80.355,158.634 80.037,158.465 79.868 C 158.193 79.596,158.159 79.597,158.159 79.883 M164.375 90.523 C 164.669 90.910,164.910 91.273,164.910 91.332 C 164.910 91.516,170.508 97.084,171.220 97.606 C 171.595 97.882,172.009 98.202,172.140 98.318 C 172.930 99.018,174.940 100.460,175.125 100.460 C 175.246 100.460,175.345 100.552,175.345 100.665 C 175.345 100.777,175.477 100.870,175.638 100.870 C 175.798 100.870,176.055 100.985,176.209 101.125 C 176.633 101.514,177.103 101.781,179.437 102.958 C 180.619 103.554,181.616 104.110,181.654 104.194 C 181.691 104.279,181.919 104.348,182.160 104.348 C 182.731 104.348,182.256 104.010,180.870 103.431 C 180.363 103.219,179.847 102.925,179.722 102.776 C 179.597 102.628,179.403 102.506,179.290 102.506 C 178.987 102.506,176.686 101.256,176.607 101.048 C 176.569 100.950,176.427 100.870,176.290 100.870 C 176.153 100.870,175.472 100.455,174.776 99.949 C 174.080 99.442,173.417 99.028,173.302 99.028 C 173.188 99.028,173.095 98.955,173.095 98.866 C 173.095 98.776,172.614 98.339,172.026 97.894 C 169.945 96.317,165.115 91.566,165.115 91.094 C 165.115 90.910,164.124 89.821,163.957 89.821 C 163.892 89.821,164.080 90.137,164.375 90.523 M183.024 104.625 C 183.245 104.777,183.657 104.952,183.939 105.013 C 184.636 105.165,185.769 105.574,186.425 105.911 C 186.724 106.064,187.254 106.189,187.602 106.189 C 187.950 106.189,188.235 106.271,188.235 106.370 C 188.235 106.469,188.857 106.617,189.616 106.697 C 190.376 106.778,191.090 106.914,191.202 107.001 C 191.315 107.088,192.037 107.207,192.807 107.266 C 193.577 107.325,194.309 107.475,194.433 107.599 C 194.730 107.896,204.114 107.917,204.297 107.621 C 204.366 107.509,204.602 107.417,204.820 107.417 C 205.039 107.417,205.217 107.345,205.217 107.257 C 205.217 107.168,204.366 107.208,203.325 107.345 C 200.193 107.757,193.107 107.424,191.611 106.794 C 191.386 106.699,190.834 106.585,190.384 106.540 C 189.290 106.431,187.654 106.012,186.940 105.658 C 186.621 105.500,186.153 105.371,185.900 105.371 C 185.646 105.371,185.373 105.305,185.293 105.225 C 185.084 105.016,183.279 104.348,182.921 104.348 C 182.706 104.348,182.736 104.427,183.024 104.625 M215.550 104.552 C 215.480 104.665,215.216 104.757,214.963 104.757 C 214.710 104.757,214.324 104.892,214.106 105.057 C 213.887 105.223,213.492 105.361,213.228 105.364 C 212.965 105.368,212.504 105.498,212.205 105.654 C 211.502 106.022,209.427 106.495,206.343 106.990 L 205.320 107.155 206.598 107.183 C 207.302 107.199,207.877 107.130,207.877 107.028 C 207.877 106.927,208.522 106.780,209.310 106.701 C 210.098 106.622,210.794 106.474,210.857 106.373 C 210.919 106.272,211.281 106.189,211.660 106.189 C 212.039 106.189,212.487 106.051,212.656 105.882 C 212.825 105.714,213.235 105.575,213.566 105.575 C 213.898 105.575,214.284 105.437,214.425 105.269 C 214.565 105.100,214.905 104.962,215.180 104.962 C 215.456 104.962,215.820 104.824,215.988 104.655 C 216.261 104.382,216.261 104.348,215.986 104.348 C 215.816 104.348,215.619 104.440,215.550 104.552 M31.611 122.533 L 30.997 122.664 30.945 147.462 C 30.894 172.181,30.895 172.262,31.308 172.483 C 31.852 172.774,42.448 172.673,42.747 172.374 C 42.879 172.242,42.959 170.051,42.966 166.440 C 42.980 157.775,43.160 156.196,43.950 157.816 C 44.097 158.117,44.304 158.363,44.410 158.363 C 44.517 158.363,44.604 158.446,44.604 158.547 C 44.604 158.649,45.386 159.904,46.343 161.336 C 47.299 162.768,48.082 164.009,48.082 164.093 C 48.082 164.178,48.220 164.361,48.389 164.501 C 48.558 164.641,48.696 164.697,48.696 164.625 C 48.696 164.296,45.124 158.756,44.515 158.141 C 44.339 157.963,44.194 157.715,44.194 157.590 C 44.194 157.210,43.332 156.712,43.062 156.937 C 42.888 157.082,42.811 159.171,42.784 164.553 C 42.750 171.192,42.711 171.996,42.407 172.226 C 41.984 172.546,32.072 172.577,31.480 172.261 C 31.113 172.064,31.100 171.216,31.100 147.410 L 31.100 122.762 32.072 122.734 C 34.977 122.650,42.458 122.786,42.597 122.925 C 42.686 123.014,42.783 129.436,42.812 137.196 L 42.864 151.304 43.378 151.364 C 43.765 151.410,43.980 151.273,44.255 150.809 C 44.454 150.471,44.730 150.075,44.867 149.930 C 45.003 149.785,45.547 149.114,46.076 148.439 C 46.604 147.764,47.180 147.051,47.355 146.854 C 47.530 146.657,47.673 146.445,47.673 146.383 C 47.673 146.198,49.826 143.348,50.196 143.044 C 50.383 142.890,50.537 142.678,50.537 142.575 C 50.537 142.471,50.767 142.138,51.049 141.835 C 51.330 141.531,51.560 141.184,51.560 141.064 C 51.560 140.943,52.104 140.252,52.768 139.527 L 53.976 138.210 59.526 138.188 C 65.511 138.165,65.585 138.179,64.659 139.126 C 64.319 139.474,64.039 139.824,64.038 139.905 C 64.036 139.985,63.783 140.337,63.475 140.686 C 62.572 141.710,61.497 143.042,61.304 143.378 C 61.127 143.684,60.863 144.013,59.635 145.459 C 59.294 145.860,58.470 146.926,57.803 147.826 C 57.137 148.726,56.381 149.692,56.122 149.972 C 55.864 150.253,55.652 150.538,55.652 150.607 C 55.652 150.677,55.416 151.000,55.128 151.326 C 54.839 151.652,54.442 152.102,54.246 152.327 C 53.415 153.279,53.307 153.998,53.890 154.691 C 54.184 155.040,54.425 155.397,54.425 155.485 C 54.425 155.572,54.632 155.871,54.885 156.150 C 55.138 156.428,55.663 157.109,56.050 157.663 C 56.438 158.217,56.876 158.744,57.022 158.834 C 57.169 158.924,57.289 159.087,57.289 159.197 C 57.289 159.429,58.412 161.053,59.795 162.820 C 60.330 163.502,60.767 164.118,60.767 164.188 C 60.767 164.257,60.997 164.563,61.279 164.866 C 61.560 165.170,61.790 165.486,61.790 165.568 C 61.790 165.651,62.458 166.632,63.274 167.747 C 64.090 168.862,64.895 169.980,65.064 170.230 C 65.233 170.481,65.623 171.008,65.931 171.403 C 66.238 171.798,66.440 172.201,66.379 172.301 C 66.218 172.560,54.989 172.530,54.300 172.268 C 53.664 172.026,52.788 171.157,52.788 170.768 C 52.788 170.625,52.512 170.199,52.174 169.821 C 51.836 169.443,51.560 169.012,51.560 168.863 C 51.560 168.715,51.474 168.593,51.369 168.593 C 51.264 168.593,51.114 168.386,51.035 168.133 C 50.956 167.880,50.834 167.627,50.763 167.570 C 50.563 167.410,49.428 165.667,49.265 165.269 C 49.184 165.072,49.021 164.910,48.902 164.910 C 48.720 164.910,49.165 165.809,49.509 166.138 C 49.568 166.194,49.726 166.425,49.861 166.650 C 51.176 168.852,52.873 171.472,53.308 171.969 L 53.843 172.583 59.979 172.648 C 64.358 172.694,66.195 172.646,66.395 172.480 C 66.705 172.223,66.578 171.652,66.154 171.396 C 66.004 171.306,65.882 171.099,65.882 170.936 C 65.882 170.773,65.790 170.639,65.678 170.639 C 65.565 170.639,65.473 170.522,65.473 170.378 C 65.473 170.234,65.197 169.814,64.859 169.445 C 64.522 169.075,64.246 168.686,64.246 168.581 C 64.246 168.475,64.153 168.389,64.041 168.389 C 63.928 168.389,63.836 168.258,63.836 168.098 C 63.836 167.937,63.583 167.543,63.274 167.220 C 62.627 166.546,62.239 165.985,62.067 165.473 C 62.001 165.276,61.874 165.115,61.784 165.115 C 61.694 165.115,61.349 164.674,61.018 164.135 C 60.686 163.596,60.287 163.017,60.131 162.848 C 59.974 162.679,59.754 162.397,59.642 162.222 C 59.107 161.388,57.778 159.463,57.596 159.258 C 57.483 159.131,57.253 158.817,57.084 158.561 C 56.916 158.304,56.524 157.797,56.215 157.434 C 55.905 157.071,55.652 156.672,55.652 156.546 C 55.652 156.420,55.566 156.317,55.461 156.317 C 55.356 156.317,55.219 156.156,55.157 155.959 C 55.094 155.762,54.793 155.332,54.488 155.003 C 53.835 154.299,53.729 153.145,54.281 152.741 C 54.473 152.601,54.629 152.382,54.629 152.254 C 54.629 152.125,54.698 152.018,54.783 152.016 C 54.867 152.014,55.297 151.507,55.739 150.891 C 56.181 150.274,56.618 149.770,56.711 149.770 C 56.804 149.770,56.880 149.639,56.880 149.480 C 56.880 149.321,56.949 149.159,57.033 149.122 C 57.118 149.084,57.553 148.593,58.002 148.031 C 58.450 147.468,58.887 146.977,58.973 146.939 C 59.060 146.902,59.130 146.775,59.130 146.657 C 59.130 146.540,59.430 146.104,59.795 145.688 C 60.932 144.397,61.381 143.838,61.381 143.714 C 61.381 143.561,63.274 141.301,63.478 141.211 C 63.563 141.173,63.632 141.017,63.632 140.863 C 63.632 140.709,63.749 140.509,63.893 140.419 C 64.037 140.329,64.460 139.862,64.835 139.381 C 65.965 137.929,65.876 137.903,59.847 137.903 C 53.656 137.903,53.691 137.897,52.840 139.013 C 52.242 139.797,51.761 140.398,51.155 141.117 C 51.040 141.253,50.946 141.438,50.946 141.529 C 50.946 141.620,50.532 142.169,50.026 142.748 C 49.519 143.326,49.105 143.861,49.105 143.935 C 49.105 144.009,48.990 144.198,48.849 144.355 C 48.390 144.868,48.151 145.173,47.169 146.509 C 46.635 147.233,46.139 147.872,46.064 147.928 C 45.990 147.985,45.688 148.399,45.392 148.849 C 44.568 150.102,43.446 151.269,43.207 151.122 C 43.062 151.032,42.988 146.475,42.976 136.927 C 42.961 124.032,42.931 122.843,42.617 122.609 C 42.251 122.335,32.838 122.270,31.611 122.533 M137.954 122.497 L 137.494 122.586 137.490 132.035 C 137.489 137.231,137.419 141.591,137.335 141.723 C 137.234 141.882,136.668 141.487,135.650 140.547 C 134.807 139.768,134.010 139.131,133.879 139.131 C 133.748 139.131,133.610 139.061,133.572 138.977 C 133.535 138.893,133.136 138.654,132.685 138.448 C 132.235 138.241,131.606 137.942,131.288 137.783 C 130.969 137.624,130.371 137.504,129.958 137.517 L 129.207 137.541 129.923 137.695 C 131.801 138.100,134.936 139.998,136.330 141.574 C 137.606 143.017,137.590 143.129,137.649 132.453 L 137.702 122.815 138.365 122.722 C 139.320 122.587,148.912 122.714,149.156 122.864 C 149.291 122.948,149.361 131.385,149.361 147.506 C 149.361 174.831,149.486 172.651,147.927 172.402 C 147.426 172.322,147.110 172.352,147.110 172.478 C 147.110 172.750,148.661 172.746,149.169 172.474 C 149.557 172.266,149.565 171.772,149.565 147.507 L 149.565 122.752 149.040 122.552 C 148.535 122.360,138.914 122.312,137.954 122.497 M181.535 122.610 L 181.074 122.825 181.074 147.526 L 181.074 172.227 181.678 172.477 C 182.009 172.614,182.401 172.678,182.547 172.620 C 182.694 172.561,182.609 172.506,182.360 172.497 C 182.111 172.488,181.812 172.303,181.695 172.085 C 181.399 171.531,181.400 123.043,181.696 122.859 C 182.017 122.661,191.276 122.567,192.276 122.751 C 192.754 122.840,193.146 122.844,193.146 122.760 C 193.146 122.306,182.482 122.167,181.535 122.610 M314.220 122.574 C 313.763 122.840,313.652 171.984,314.107 172.440 C 314.286 172.619,315.845 172.685,319.841 172.685 L 325.330 172.685 325.529 172.161 C 325.645 171.855,325.729 168.601,325.729 164.386 C 325.729 157.272,325.737 157.136,326.138 157.136 C 326.365 157.136,326.547 157.272,326.547 157.442 C 326.547 157.611,326.633 157.749,326.738 157.749 C 326.843 157.749,326.980 157.910,327.043 158.107 C 327.105 158.304,327.376 158.702,327.645 158.992 C 327.914 159.282,328.197 159.719,328.275 159.964 C 328.353 160.209,328.491 160.409,328.583 160.409 C 328.675 160.409,328.808 160.570,328.880 160.767 C 329.021 161.159,329.213 161.480,330.131 162.864 C 330.467 163.371,330.811 163.816,330.895 163.853 C 330.980 163.891,331.049 164.038,331.049 164.180 C 331.049 164.322,331.231 164.660,331.454 164.930 C 332.217 165.855,332.655 166.523,332.818 167.008 C 332.884 167.205,332.998 167.366,333.072 167.366 C 333.145 167.366,333.432 167.780,333.708 168.286 C 333.985 168.793,334.272 169.207,334.345 169.207 C 334.419 169.207,334.533 169.368,334.599 169.565 C 334.717 169.916,335.142 170.642,335.347 170.844 C 335.404 170.900,335.681 171.291,335.961 171.712 C 336.277 172.188,336.626 172.473,336.880 172.465 C 337.233 172.454,337.241 172.433,336.939 172.313 C 336.571 172.167,335.645 171.028,335.328 170.332 C 335.145 169.930,334.785 169.335,334.468 168.911 C 334.280 168.661,332.272 165.635,331.969 165.148 C 331.857 164.967,331.281 164.108,330.691 163.239 C 330.100 162.370,329.616 161.559,329.616 161.437 C 329.616 161.315,329.478 161.162,329.309 161.097 C 329.141 161.032,329.000 160.874,328.997 160.745 C 328.989 160.397,326.705 157.101,326.297 156.850 C 325.600 156.421,325.546 156.936,325.511 164.366 C 325.492 168.399,325.430 171.876,325.373 172.093 C 325.274 172.472,325.053 172.485,319.720 172.433 L 314.169 172.379 314.117 147.570 C 314.068 124.044,314.083 122.761,314.424 122.745 C 315.836 122.675,325.209 122.796,325.354 122.886 C 325.454 122.947,325.522 123.106,325.505 123.238 C 325.489 123.370,325.487 129.762,325.500 137.442 L 325.524 151.407 326.138 151.407 C 326.476 151.407,326.752 151.330,326.752 151.237 C 326.752 151.143,327.119 150.660,327.567 150.163 C 328.016 149.665,328.384 149.164,328.386 149.048 C 328.387 148.932,328.568 148.684,328.788 148.496 C 329.008 148.308,329.444 147.758,329.758 147.274 C 330.072 146.790,330.384 146.348,330.453 146.292 C 330.521 146.235,331.530 144.900,332.695 143.325 C 333.861 141.749,334.934 140.387,335.080 140.297 C 335.226 140.207,335.345 140.018,335.345 139.877 C 335.345 139.735,335.673 139.303,336.073 138.915 L 336.801 138.210 341.795 138.210 C 344.542 138.210,346.631 138.150,346.438 138.078 C 345.882 137.868,337.294 137.872,336.742 138.082 C 336.468 138.186,335.703 138.994,335.042 139.877 C 334.381 140.761,333.786 141.529,333.718 141.586 C 333.463 141.799,332.276 143.390,332.276 143.519 C 332.276 143.593,332.000 143.948,331.663 144.308 C 331.326 144.667,331.050 145.069,331.050 145.200 C 331.049 145.332,330.977 145.470,330.890 145.507 C 330.803 145.545,330.274 146.173,329.714 146.903 C 329.154 147.633,328.581 148.353,328.440 148.503 C 328.299 148.653,328.183 148.839,328.181 148.915 C 328.179 148.991,327.812 149.468,327.366 149.974 C 326.919 150.481,326.552 150.964,326.551 151.049 C 326.549 151.133,326.363 151.202,326.138 151.202 C 325.733 151.202,325.729 151.066,325.729 137.173 C 325.729 127.894,325.657 123.010,325.517 122.749 C 325.274 122.295,314.972 122.136,314.220 122.574 M169.707 122.781 C 169.644 122.884,167.496 122.967,164.912 122.967 C 162.293 122.967,159.995 123.057,159.694 123.171 L 159.157 123.375 159.221 127.382 C 159.301 132.475,158.624 131.969,165.359 131.969 C 172.087 131.969,171.458 132.455,171.458 127.268 L 171.458 123.386 170.640 122.990 C 170.190 122.773,169.770 122.679,169.707 122.781 M170.713 123.285 C 171.166 123.398,171.170 123.433,171.152 127.122 C 171.126 132.277,171.772 131.765,165.303 131.765 L 159.980 131.765 159.702 131.102 C 159.548 130.737,159.463 130.374,159.512 130.294 C 159.561 130.215,159.607 128.695,159.614 126.916 C 159.621 125.138,159.709 123.583,159.810 123.462 C 160.003 123.228,169.850 123.068,170.713 123.285 M193.025 126.650 C 193.025 128.619,193.056 129.425,193.094 128.440 C 193.131 127.455,193.131 125.844,193.094 124.859 C 193.056 123.875,193.025 124.680,193.025 126.650 M192.993 136.028 C 192.990 137.192,193.053 138.067,193.135 137.972 C 193.216 137.878,193.219 136.926,193.141 135.857 L 193.000 133.913 192.993 136.028 M85.320 137.191 C 84.588 137.347,83.414 137.479,82.711 137.484 C 82.008 137.489,81.432 137.579,81.432 137.684 C 81.432 137.789,81.225 137.914,80.972 137.963 C 80.620 138.031,80.660 138.058,81.142 138.080 C 81.489 138.095,81.842 138.038,81.925 137.954 C 82.521 137.352,90.181 137.348,93.045 137.948 C 93.636 138.072,94.181 138.112,94.255 138.038 C 94.330 137.964,94.196 137.903,93.959 137.903 C 93.722 137.903,93.471 137.811,93.402 137.698 C 93.332 137.586,92.705 137.490,92.008 137.485 C 91.312 137.480,90.327 137.382,89.821 137.268 C 88.280 136.920,86.717 136.893,85.320 137.191 M241.432 137.113 C 241.151 137.228,240.069 137.374,239.028 137.437 C 237.987 137.501,237.136 137.624,237.136 137.710 C 237.136 137.796,236.760 137.930,236.300 138.008 C 235.841 138.086,235.220 138.277,234.919 138.434 C 234.619 138.591,234.257 138.719,234.115 138.720 C 233.973 138.721,233.696 138.807,233.501 138.911 C 233.306 139.015,233.008 139.157,232.839 139.226 C 231.960 139.584,229.676 141.235,228.879 142.087 C 227.784 143.259,226.847 144.460,226.950 144.563 C 227.006 144.619,227.409 144.225,227.844 143.688 C 229.374 141.801,232.457 139.335,233.286 139.335 C 233.445 139.335,233.663 139.262,233.770 139.173 C 233.975 139.003,236.264 138.270,237.647 137.931 C 239.215 137.547,243.519 137.291,245.013 137.492 C 245.801 137.598,246.923 137.688,247.507 137.692 C 248.091 137.695,248.626 137.790,248.696 137.903 C 248.765 138.015,249.116 138.107,249.475 138.106 L 250.128 138.105 249.605 137.832 C 249.318 137.682,248.242 137.505,247.214 137.438 C 246.186 137.372,245.162 137.219,244.937 137.099 C 244.426 136.825,242.118 136.835,241.432 137.113 M285.013 137.195 C 284.394 137.338,283.274 137.463,282.523 137.474 C 281.773 137.485,281.128 137.587,281.090 137.702 C 281.052 137.817,280.538 137.967,279.948 138.037 C 279.357 138.107,278.875 138.244,278.875 138.341 C 278.875 138.437,278.682 138.517,278.446 138.517 C 278.210 138.517,277.773 138.648,277.474 138.807 C 277.175 138.967,276.793 139.153,276.624 139.219 C 276.455 139.285,276.041 139.522,275.703 139.744 C 275.366 139.967,274.951 140.214,274.783 140.294 C 274.149 140.595,271.509 142.989,271.509 143.263 C 271.509 143.369,271.394 143.585,271.253 143.742 C 270.675 144.386,270.529 144.605,270.395 145.029 C 270.317 145.273,270.168 145.473,270.063 145.473 C 269.958 145.473,269.872 145.706,269.872 145.991 C 269.872 146.276,269.734 146.562,269.565 146.627 C 269.395 146.692,269.258 146.996,269.258 147.311 C 269.258 147.623,269.120 147.993,268.951 148.133 C 268.766 148.287,268.645 148.734,268.645 149.260 C 268.645 149.740,268.507 150.396,268.339 150.718 C 268.098 151.180,268.033 152.153,268.033 155.294 C 268.033 158.435,268.098 159.409,268.339 159.870 C 268.507 160.192,268.645 160.802,268.645 161.226 C 268.645 161.661,268.778 162.107,268.951 162.251 C 269.120 162.391,269.258 162.759,269.258 163.069 C 269.258 163.379,269.396 163.747,269.565 163.887 C 269.734 164.028,269.872 164.310,269.872 164.514 C 269.872 164.719,269.955 164.937,270.056 165.000 C 270.156 165.062,270.428 165.476,270.659 165.919 C 271.466 167.467,273.629 169.650,275.011 170.313 C 275.223 170.414,275.396 170.575,275.396 170.671 C 275.396 170.766,275.523 170.844,275.678 170.844 C 275.833 170.844,276.075 170.982,276.215 171.151 C 276.355 171.320,276.677 171.458,276.931 171.458 C 277.185 171.458,277.507 171.596,277.647 171.765 C 277.787 171.934,278.167 172.072,278.491 172.072 C 278.814 172.072,279.079 172.155,279.079 172.257 C 279.079 172.359,279.540 172.506,280.102 172.583 C 280.665 172.660,281.176 172.807,281.239 172.909 C 281.303 173.011,281.694 173.082,282.109 173.067 C 282.668 173.046,282.732 173.015,282.353 172.947 C 282.072 172.897,281.754 172.771,281.647 172.668 C 281.540 172.565,281.218 172.481,280.931 172.482 C 278.336 172.487,271.100 167.810,271.100 166.128 C 271.100 165.908,271.031 165.728,270.946 165.728 C 270.748 165.726,270.077 164.549,270.077 164.203 C 270.077 164.057,269.939 163.823,269.770 163.683 C 269.601 163.543,269.460 163.186,269.456 162.891 C 269.453 162.595,269.315 162.174,269.150 161.956 C 268.984 161.737,268.849 161.179,268.849 160.716 C 268.849 160.253,268.714 159.695,268.549 159.476 C 268.109 158.895,268.104 152.117,268.542 151.068 C 268.711 150.664,268.852 150.000,268.856 149.591 C 268.859 149.183,268.997 148.670,269.163 148.452 C 269.328 148.234,269.463 147.836,269.463 147.568 C 269.463 147.300,269.601 146.943,269.770 146.774 C 269.939 146.605,270.077 146.289,270.077 146.072 C 270.077 145.855,270.159 145.678,270.259 145.678 C 270.359 145.678,270.499 145.448,270.570 145.166 C 270.641 144.885,270.789 144.655,270.899 144.655 C 271.009 144.655,271.100 144.526,271.100 144.368 C 271.100 144.015,273.998 140.972,274.334 140.972 C 274.468 140.972,274.578 140.898,274.578 140.808 C 274.578 140.718,274.992 140.443,275.499 140.197 C 276.005 139.951,276.419 139.667,276.419 139.566 C 276.419 139.464,276.673 139.334,276.982 139.275 C 277.292 139.217,277.959 139.012,278.465 138.819 C 281.953 137.493,290.636 136.929,292.427 137.912 C 292.622 138.020,293.083 138.097,293.450 138.084 C 293.881 138.068,293.972 138.025,293.708 137.962 C 293.483 137.907,293.212 137.780,293.105 137.678 C 292.998 137.577,292.353 137.492,291.673 137.490 C 290.992 137.488,289.790 137.350,289.003 137.183 C 287.349 136.833,286.577 136.835,285.013 137.195 M202.353 137.263 C 201.682 137.363,202.322 137.444,204.706 137.563 C 206.506 137.653,208.067 137.812,208.174 137.917 C 208.281 138.022,208.603 138.107,208.890 138.106 L 209.412 138.105 208.890 137.833 C 208.603 137.683,207.590 137.499,206.639 137.425 C 205.688 137.351,204.542 137.253,204.092 137.208 C 203.642 137.163,202.859 137.188,202.353 137.263 M123.740 137.441 C 122.411 137.510,120.584 138.103,121.691 138.106 C 121.945 138.107,122.314 138.016,122.509 137.903 C 122.705 137.791,124.246 137.621,125.934 137.524 C 128.282 137.391,128.546 137.352,127.059 137.359 C 125.990 137.365,124.496 137.401,123.740 137.441 M363.836 137.442 C 362.458 137.477,361.330 137.589,361.330 137.691 C 361.330 137.793,361.123 137.915,360.870 137.964 C 360.616 138.012,360.731 138.014,361.125 137.967 C 361.519 137.921,363.257 137.798,364.988 137.695 C 366.719 137.593,368.184 137.459,368.245 137.399 C 368.305 137.338,367.902 137.309,367.349 137.333 C 366.795 137.358,365.215 137.406,363.836 137.442 M368.654 137.532 C 368.733 137.609,369.719 137.716,370.844 137.771 C 371.969 137.826,373.304 137.919,373.811 137.978 C 374.317 138.038,374.547 138.040,374.322 137.984 C 374.097 137.928,373.729 137.796,373.504 137.692 C 373.031 137.473,368.438 137.321,368.654 137.532 M199.398 137.807 C 199.006 138.104,199.006 138.107,199.408 138.107 C 199.633 138.107,199.903 138.022,200.010 137.919 C 200.117 137.815,200.481 137.690,200.818 137.642 C 201.330 137.569,201.296 137.551,200.614 137.531 C 200.164 137.517,199.617 137.642,199.398 137.807 M159.642 138.107 L 159.182 138.299 159.182 155.083 C 159.182 171.594,159.188 171.874,159.591 172.276 C 160.049 172.734,169.805 172.915,170.933 172.486 L 171.458 172.286 171.458 155.311 C 171.458 141.956,171.403 138.301,171.202 138.171 C 170.837 137.935,160.198 137.877,159.642 138.107 M79.386 138.294 C 79.386 138.397,79.018 138.543,78.568 138.619 C 78.118 138.695,77.749 138.841,77.749 138.944 C 77.749 139.046,77.576 139.130,77.365 139.130 C 77.154 139.130,76.866 139.269,76.726 139.437 C 76.586 139.606,76.389 139.744,76.289 139.744 C 75.653 139.744,72.730 142.289,71.816 143.638 C 71.647 143.887,71.394 144.211,71.253 144.358 C 71.113 144.505,70.997 144.713,70.997 144.820 C 70.997 144.926,70.859 145.128,70.691 145.269 C 70.522 145.409,70.384 145.685,70.384 145.882 C 70.384 146.080,70.246 146.356,70.077 146.496 C 69.908 146.636,69.770 147.008,69.770 147.323 C 69.770 147.637,69.672 147.927,69.552 147.967 C 69.432 148.007,69.282 148.452,69.217 148.956 C 69.153 149.460,69.021 149.974,68.924 150.098 C 68.678 150.411,68.434 157.659,68.664 157.799 C 68.771 157.864,68.865 156.392,68.887 154.324 C 68.911 152.115,69.009 150.653,69.143 150.519 C 69.263 150.400,69.364 149.975,69.368 149.575 C 69.372 149.176,69.507 148.619,69.668 148.338 C 69.828 148.056,69.963 147.630,69.967 147.391 C 69.971 147.151,70.113 146.841,70.281 146.701 C 70.450 146.561,70.593 146.296,70.599 146.113 C 70.617 145.535,73.554 141.588,73.966 141.586 C 74.080 141.586,74.421 141.355,74.725 141.074 C 75.028 140.793,75.368 140.563,75.480 140.563 C 75.591 140.563,75.757 140.448,75.847 140.307 C 75.937 140.166,76.379 139.879,76.829 139.669 C 77.279 139.459,77.891 139.160,78.190 139.004 C 78.489 138.849,78.870 138.721,79.036 138.721 C 79.203 138.721,79.603 138.584,79.925 138.416 L 80.512 138.110 79.949 138.109 C 79.639 138.108,79.386 138.191,79.386 138.294 M94.783 138.248 C 94.980 138.300,95.141 138.427,95.141 138.532 C 95.141 138.636,95.380 138.721,95.672 138.721 C 95.964 138.721,96.447 138.849,96.746 139.004 C 97.045 139.160,97.657 139.459,98.107 139.669 C 98.558 139.879,98.972 140.106,99.028 140.174 C 99.084 140.242,99.521 140.542,99.999 140.841 C 101.041 141.494,102.564 143.018,103.298 144.143 C 103.592 144.593,103.879 145.008,103.937 145.064 C 104.037 145.162,104.338 145.798,105.001 147.315 C 107.097 152.108,106.604 160.371,103.925 165.368 C 103.683 165.818,103.682 165.990,103.921 165.842 C 104.024 165.779,104.304 165.290,104.545 164.756 C 104.785 164.222,105.115 163.525,105.279 163.206 C 105.442 162.887,105.575 162.366,105.575 162.047 C 105.575 161.727,105.674 161.433,105.795 161.393 C 105.916 161.353,106.067 160.724,106.129 159.995 C 106.192 159.266,106.321 158.572,106.415 158.451 C 106.679 158.116,106.676 152.425,106.412 152.161 C 106.289 152.039,106.189 151.376,106.189 150.689 C 106.189 149.906,106.077 149.290,105.889 149.042 C 105.724 148.823,105.586 148.429,105.582 148.165 C 105.578 147.901,105.448 147.440,105.292 147.142 C 105.137 146.843,104.837 146.230,104.627 145.780 C 104.417 145.330,104.192 144.916,104.126 144.859 C 104.060 144.803,103.922 144.607,103.819 144.423 C 103.522 143.894,102.246 142.366,101.715 141.904 C 101.449 141.673,100.943 141.231,100.590 140.923 C 100.237 140.614,99.788 140.309,99.591 140.244 C 99.394 140.179,99.233 140.040,99.233 139.935 C 99.233 139.830,99.106 139.744,98.951 139.744 C 98.796 139.744,98.554 139.606,98.414 139.437 C 98.274 139.269,97.941 139.130,97.673 139.130 C 97.406 139.130,97.187 139.046,97.187 138.944 C 97.187 138.841,96.819 138.695,96.369 138.619 C 95.920 138.543,95.500 138.397,95.437 138.294 C 95.373 138.191,95.119 138.118,94.873 138.131 C 94.527 138.149,94.506 138.176,94.783 138.248 M120.512 138.290 C 120.512 138.390,120.258 138.535,119.949 138.612 C 118.393 139.000,114.578 142.831,114.578 144.006 C 114.578 144.110,114.440 144.310,114.271 144.450 C 114.102 144.590,113.964 144.912,113.964 145.166 C 113.964 145.420,113.826 145.742,113.657 145.882 C 113.488 146.022,113.347 146.471,113.344 146.879 C 113.340 147.287,113.202 147.800,113.037 148.019 C 112.871 148.238,112.737 148.850,112.737 149.388 C 112.737 149.922,112.645 150.416,112.532 150.486 C 112.419 150.555,112.334 151.044,112.341 151.572 L 112.355 152.532 112.645 151.611 C 112.804 151.105,112.940 150.276,112.945 149.770 C 112.951 149.263,113.087 148.619,113.248 148.338 C 113.409 148.056,113.544 147.520,113.548 147.147 C 113.552 146.773,113.693 146.329,113.862 146.160 C 114.031 145.991,114.169 145.630,114.169 145.356 C 114.169 145.083,114.252 144.859,114.353 144.859 C 114.455 144.859,114.630 144.606,114.743 144.297 C 115.310 142.739,118.277 139.389,119.131 139.343 C 119.493 139.324,121.199 138.115,120.870 138.111 C 120.673 138.109,120.512 138.190,120.512 138.290 M170.934 138.334 C 171.002 138.402,171.064 146.039,171.072 155.304 L 171.086 172.151 170.607 172.328 C 168.677 173.043,158.982 172.278,159.492 171.451 C 159.544 171.369,159.590 163.974,159.594 155.019 C 159.602 140.370,159.636 138.705,159.931 138.410 C 160.262 138.079,170.608 138.007,170.934 138.334 M198.261 138.296 C 198.261 138.399,197.985 138.545,197.647 138.619 C 197.309 138.693,197.033 138.838,197.033 138.942 C 197.033 139.046,196.916 139.130,196.772 139.130 C 196.628 139.130,195.871 139.775,195.090 140.563 C 193.556 142.108,193.435 142.180,193.275 141.637 C 193.192 141.356,193.178 141.366,193.211 141.686 C 193.285 142.407,193.961 142.297,194.652 141.452 C 195.629 140.254,196.429 139.558,197.442 139.021 C 198.841 138.280,199.055 138.114,198.619 138.111 C 198.422 138.109,198.261 138.192,198.261 138.296 M209.792 138.414 C 209.961 138.583,210.198 138.721,210.319 138.721 C 211.596 138.721,215.448 142.360,215.938 144.031 C 216.038 144.374,216.199 144.655,216.296 144.655 C 216.392 144.655,216.471 144.818,216.471 145.018 C 216.471 145.218,216.597 145.564,216.752 145.786 C 216.907 146.008,217.099 146.580,217.179 147.058 C 217.259 147.535,217.409 147.978,217.511 148.042 C 217.614 148.105,217.701 148.635,217.705 149.219 C 217.709 149.803,217.844 150.512,218.005 150.793 C 218.433 151.542,218.433 158.173,218.005 159.386 C 217.836 159.865,217.698 160.587,217.698 160.991 C 217.698 161.395,217.572 162.097,217.417 162.551 C 217.263 163.005,217.024 163.744,216.886 164.194 C 216.529 165.363,215.434 167.534,214.834 168.263 C 213.604 169.757,211.926 171.253,211.481 171.253 C 211.327 171.253,211.086 171.391,210.946 171.560 C 210.806 171.729,210.530 171.867,210.332 171.867 C 210.135 171.867,209.859 172.005,209.719 172.174 C 209.579 172.343,209.256 172.481,209.001 172.481 C 208.746 172.481,208.274 172.618,207.952 172.786 C 207.428 173.059,207.414 173.092,207.814 173.093 C 208.061 173.094,208.319 173.003,208.389 172.890 C 208.458 172.777,208.703 172.685,208.932 172.685 C 209.161 172.685,209.593 172.555,209.892 172.395 C 210.190 172.235,210.573 172.047,210.742 171.977 C 212.374 171.305,215.652 168.250,215.652 167.400 C 215.652 167.287,215.721 167.165,215.806 167.127 C 216.030 167.027,216.675 165.745,216.675 165.399 C 216.675 165.236,216.813 165.049,216.982 164.984 C 217.168 164.913,217.289 164.604,217.289 164.197 C 217.289 163.829,217.427 163.198,217.596 162.794 C 217.765 162.390,217.903 161.706,217.903 161.275 C 217.903 160.844,218.018 160.376,218.159 160.235 C 218.589 159.805,218.651 151.207,218.230 150.362 C 218.050 150.002,217.900 149.284,217.896 148.767 C 217.893 148.249,217.755 147.647,217.589 147.429 C 217.424 147.210,217.289 146.727,217.289 146.355 C 217.289 145.982,217.199 145.678,217.088 145.678 C 216.978 145.678,216.824 145.425,216.747 145.117 C 216.669 144.809,216.484 144.434,216.334 144.284 C 216.184 144.134,216.061 143.834,216.061 143.617 C 216.061 143.400,215.969 143.223,215.857 143.223 C 215.744 143.223,215.652 143.093,215.652 142.935 C 215.652 142.485,213.004 139.881,211.867 139.212 C 209.852 138.026,209.124 137.746,209.792 138.414 M250.747 138.385 C 250.969 138.537,251.381 138.714,251.662 138.777 C 252.504 138.967,253.705 139.455,253.961 139.710 C 254.092 139.841,254.313 139.949,254.453 139.949 C 254.592 139.949,255.009 140.225,255.378 140.563 C 255.748 140.900,256.143 141.176,256.257 141.176 C 256.550 141.176,259.028 143.868,259.028 144.187 C 259.028 144.332,259.104 144.450,259.196 144.450 C 259.289 144.450,259.571 144.862,259.822 145.366 C 260.074 145.870,260.366 146.336,260.472 146.401 C 260.578 146.467,260.665 146.725,260.665 146.974 C 260.665 147.224,260.792 147.610,260.946 147.832 C 261.101 148.054,261.278 148.604,261.339 149.054 C 261.400 149.504,261.546 150.286,261.662 150.793 C 261.779 151.299,261.897 153.325,261.923 155.294 C 261.950 157.263,262.005 158.276,262.045 157.545 C 262.086 156.813,262.206 156.127,262.313 156.020 C 262.557 155.775,262.568 153.720,262.326 153.570 C 262.227 153.509,262.081 152.583,262.000 151.512 C 261.920 150.441,261.771 149.565,261.669 149.565 C 261.567 149.565,261.483 149.162,261.483 148.670 C 261.483 148.123,261.364 147.675,261.176 147.519 C 261.008 147.379,260.870 147.043,260.870 146.772 C 260.870 146.501,260.731 146.226,260.563 146.161 C 260.394 146.096,260.256 145.924,260.256 145.779 C 260.256 144.988,257.190 141.341,255.939 140.644 C 255.556 140.430,255.169 140.141,255.079 140.000 C 254.989 139.859,254.776 139.744,254.604 139.744 C 254.433 139.744,254.155 139.606,253.986 139.437 C 253.817 139.269,253.502 139.130,253.285 139.130 C 253.068 139.130,252.890 139.039,252.890 138.928 C 252.890 138.817,252.520 138.667,252.067 138.594 C 251.614 138.522,251.195 138.383,251.134 138.285 C 251.074 138.187,250.871 138.107,250.684 138.107 C 250.398 138.107,250.408 138.151,250.747 138.385 M294.718 138.423 C 295.049 138.596,295.463 138.698,295.639 138.650 C 295.898 138.581,295.890 138.560,295.601 138.540 C 295.404 138.527,295.243 138.425,295.243 138.312 C 295.243 138.199,294.990 138.108,294.680 138.109 L 294.118 138.110 294.718 138.423 M347.931 138.316 C 348.002 138.431,347.616 139.066,347.073 139.729 C 346.531 140.392,345.857 141.236,345.575 141.605 C 345.294 141.975,344.764 142.651,344.398 143.108 C 344.031 143.565,343.661 144.031,343.575 144.143 C 341.921 146.314,341.337 147.036,341.125 147.171 C 340.985 147.261,340.870 147.461,340.870 147.615 C 340.870 147.768,340.792 147.925,340.698 147.962 C 340.603 148.000,340.177 148.491,339.752 149.054 C 339.327 149.616,338.916 150.123,338.840 150.179 C 338.764 150.235,338.249 150.880,337.696 151.611 C 337.142 152.343,336.617 152.972,336.529 153.009 C 335.931 153.264,336.474 154.551,337.900 156.259 C 338.014 156.396,338.223 156.645,338.363 156.813 C 338.504 156.981,338.619 157.210,338.619 157.321 C 338.619 157.433,338.739 157.598,338.885 157.688 C 339.032 157.778,339.604 158.542,340.158 159.386 C 340.712 160.230,341.329 161.099,341.529 161.317 C 341.729 161.535,342.233 162.249,342.650 162.903 C 343.067 163.557,343.481 164.092,343.571 164.092 C 343.661 164.092,343.734 164.193,343.734 164.316 C 343.734 164.439,344.148 165.085,344.655 165.750 C 345.161 166.416,345.575 167.019,345.575 167.089 C 345.575 167.159,345.806 167.430,346.087 167.691 C 346.368 167.951,346.598 168.215,346.598 168.278 C 346.598 168.340,347.196 169.260,347.927 170.322 C 348.657 171.385,349.183 172.299,349.095 172.353 C 349.007 172.408,346.368 172.459,343.231 172.467 C 340.094 172.475,337.481 172.528,337.425 172.584 C 337.166 172.843,348.984 172.679,349.340 172.419 C 349.671 172.177,349.675 172.128,349.379 171.882 C 349.200 171.734,349.054 171.527,349.054 171.422 C 349.054 171.317,348.778 170.937,348.440 170.577 C 348.103 170.218,347.693 169.642,347.529 169.298 C 347.365 168.955,346.997 168.420,346.710 168.111 C 346.424 167.802,346.189 167.462,346.189 167.355 C 346.189 167.248,346.103 167.161,345.998 167.161 C 345.893 167.161,345.756 167.000,345.694 166.803 C 345.631 166.606,345.372 166.210,345.117 165.923 C 344.535 165.265,344.165 164.705,344.011 164.246 C 343.945 164.049,343.817 163.887,343.727 163.887 C 343.637 163.887,343.352 163.542,343.093 163.120 C 342.835 162.698,342.528 162.241,342.412 162.104 C 341.792 161.378,341.688 161.231,341.688 161.077 C 341.688 160.985,341.435 160.627,341.125 160.282 C 340.816 159.937,340.383 159.341,340.164 158.958 C 339.945 158.574,339.553 158.032,339.294 157.751 C 339.035 157.471,338.821 157.149,338.818 157.035 C 338.815 156.922,338.552 156.574,338.234 156.262 C 337.916 155.950,337.483 155.375,337.272 154.983 C 337.062 154.592,336.818 154.271,336.731 154.271 C 336.644 154.271,336.573 154.041,336.573 153.760 C 336.573 153.478,336.665 153.248,336.777 153.248 C 336.890 153.248,336.982 153.115,336.982 152.951 C 336.982 152.788,337.100 152.581,337.243 152.491 C 337.387 152.401,337.823 151.913,338.212 151.407 C 338.602 150.900,339.013 150.374,339.127 150.237 C 339.481 149.814,339.721 149.507,340.752 148.160 C 341.301 147.443,342.012 146.588,342.332 146.260 C 342.653 145.932,342.916 145.562,342.916 145.438 C 342.916 145.315,343.146 145.000,343.427 144.739 C 343.708 144.478,343.939 144.205,343.939 144.131 C 343.939 143.949,345.145 142.407,345.722 141.851 C 345.979 141.603,346.189 141.321,346.189 141.225 C 346.189 141.128,346.465 140.784,346.803 140.460 C 347.141 140.137,347.417 139.793,347.417 139.697 C 347.417 139.601,347.642 139.279,347.917 138.982 C 348.399 138.462,348.435 138.107,348.007 138.107 C 347.894 138.107,347.860 138.201,347.931 138.316 M359.284 138.286 C 359.284 138.384,358.916 138.523,358.465 138.595 C 358.015 138.667,357.647 138.817,357.647 138.928 C 357.647 139.039,357.499 139.130,357.318 139.130 C 356.546 139.130,353.305 142.206,352.662 143.551 C 352.452 143.989,352.145 144.604,351.981 144.918 C 351.516 145.805,351.519 151.262,351.985 151.777 C 352.173 151.985,352.327 152.275,352.327 152.423 C 352.327 152.713,353.975 154.859,354.209 154.875 C 354.288 154.881,354.587 155.102,354.873 155.368 C 355.160 155.633,355.855 156.069,356.418 156.337 C 356.982 156.604,357.442 156.893,357.442 156.979 C 357.442 157.065,357.650 157.138,357.903 157.142 C 358.156 157.146,358.542 157.284,358.760 157.449 C 358.979 157.614,359.314 157.749,359.504 157.749 C 359.695 157.749,360.115 157.887,360.437 158.055 C 360.759 158.223,361.179 158.361,361.369 158.362 C 361.559 158.363,361.772 158.455,361.841 158.568 C 361.911 158.680,362.170 158.772,362.416 158.771 C 362.816 158.770,362.802 158.737,362.278 158.464 C 361.956 158.296,361.536 158.159,361.346 158.159 C 361.155 158.159,360.820 158.023,360.602 157.858 C 360.383 157.693,360.015 157.555,359.783 157.551 C 359.552 157.548,359.183 157.410,358.965 157.244 C 358.746 157.079,358.361 156.941,358.107 156.937 C 357.854 156.934,357.647 156.857,357.647 156.766 C 357.647 156.675,357.256 156.429,356.777 156.219 C 354.960 155.422,353.095 153.581,352.295 151.796 C 351.797 150.682,351.748 146.256,352.224 145.343 C 352.392 145.021,352.530 144.607,352.531 144.424 C 352.531 144.241,352.670 143.976,352.839 143.836 C 353.008 143.696,353.146 143.458,353.146 143.307 C 353.146 142.352,357.797 138.740,359.057 138.715 C 359.632 138.703,360.295 138.107,359.732 138.107 C 359.486 138.107,359.284 138.188,359.284 138.286 M375.141 138.246 C 377.027 138.665,377.471 139.065,377.330 140.220 C 377.272 140.690,377.188 142.064,377.142 143.274 C 377.055 145.579,376.968 145.747,376.110 145.279 C 373.574 143.897,366.812 143.399,364.501 144.424 C 362.738 145.207,361.996 147.068,362.939 148.343 C 363.179 148.669,363.380 149.008,363.385 149.097 C 363.396 149.315,364.769 150.179,365.104 150.179 C 365.251 150.179,365.487 150.317,365.627 150.486 C 365.767 150.655,365.998 150.793,366.140 150.793 C 366.282 150.793,366.662 150.930,366.984 151.098 C 367.307 151.267,367.724 151.405,367.912 151.405 C 368.100 151.406,368.514 151.536,368.833 151.695 C 369.664 152.108,370.359 152.385,370.946 152.535 C 371.807 152.756,374.932 154.217,375.880 154.840 C 376.952 155.546,377.698 156.195,377.698 156.422 C 377.698 156.550,377.928 156.871,378.210 157.136 C 378.491 157.400,378.721 157.727,378.721 157.862 C 378.721 157.998,378.859 158.223,379.028 158.363 C 379.197 158.503,379.335 158.877,379.335 159.195 C 379.335 159.512,379.427 159.828,379.540 159.898 C 379.652 159.967,379.753 160.318,379.765 160.677 C 379.784 161.289,379.794 161.298,379.932 160.818 C 380.099 160.235,379.988 159.591,379.720 159.591 C 379.621 159.591,379.540 159.326,379.540 159.002 C 379.540 158.678,379.402 158.299,379.233 158.159 C 379.064 158.018,378.926 157.813,378.926 157.703 C 378.926 157.448,377.701 155.864,377.323 155.629 C 377.166 155.532,376.879 155.302,376.685 155.118 C 376.244 154.698,375.680 154.327,375.109 154.079 C 374.867 153.973,374.608 153.789,374.535 153.670 C 374.461 153.550,374.176 153.453,373.901 153.453 C 373.626 153.453,373.402 153.371,373.402 153.271 C 373.402 153.171,373.079 153.029,372.685 152.955 C 372.292 152.881,371.969 152.732,371.969 152.625 C 371.969 152.518,371.776 152.430,371.540 152.430 C 371.120 152.430,370.195 152.085,369.037 151.496 C 368.719 151.335,368.289 151.202,368.082 151.202 C 367.875 151.202,367.445 151.072,367.127 150.913 C 366.808 150.754,366.182 150.455,365.734 150.248 C 363.973 149.433,362.762 148.181,362.762 147.174 C 362.762 145.756,364.183 144.450,365.725 144.450 C 366.108 144.450,366.478 144.358,366.547 144.246 C 366.617 144.133,367.492 144.041,368.491 144.041 C 369.491 144.041,370.365 144.133,370.435 144.246 C 370.504 144.358,371.039 144.454,371.623 144.459 C 372.207 144.464,373.054 144.601,373.504 144.763 C 373.954 144.925,374.509 145.059,374.737 145.061 C 374.965 145.063,375.358 145.208,375.609 145.384 C 376.355 145.906,377.173 145.696,377.256 144.962 C 377.294 144.624,377.397 144.256,377.484 144.143 C 377.571 144.031,377.657 142.803,377.675 141.416 L 377.706 138.893 377.089 138.660 C 376.749 138.532,376.471 138.355,376.471 138.267 C 376.471 138.179,376.079 138.118,375.601 138.131 C 375.123 138.144,374.916 138.196,375.141 138.246 M192.956 138.760 C 192.990 139.409,193.321 139.874,193.336 139.296 C 193.344 138.993,193.258 138.688,193.146 138.619 C 193.033 138.549,192.948 138.613,192.956 138.760 M296.356 139.035 C 296.575 139.200,296.915 139.335,297.111 139.335 C 297.308 139.335,297.520 139.418,297.583 139.518 C 297.645 139.619,298.059 139.891,298.502 140.122 C 299.825 140.811,301.809 142.677,302.779 144.143 C 303.077 144.593,303.369 145.008,303.428 145.064 C 303.657 145.283,304.729 147.659,304.905 148.338 C 305.007 148.731,305.167 149.330,305.261 149.668 L 305.431 150.281 305.452 149.526 C 305.464 149.111,305.392 148.721,305.292 148.659 C 305.192 148.597,305.049 148.217,304.973 147.815 C 304.897 147.412,304.658 146.789,304.440 146.431 C 304.222 146.073,303.982 145.642,303.905 145.473 C 303.440 144.447,301.529 141.995,301.195 141.995 C 301.072 141.995,300.972 141.857,300.972 141.688 C 300.972 141.519,300.841 141.381,300.682 141.381 C 300.523 141.381,300.361 141.311,300.324 141.226 C 300.195 140.932,298.101 139.446,297.494 139.216 C 297.325 139.153,297.027 139.015,296.831 138.911 C 296.265 138.609,295.914 138.700,296.356 139.035 M86.677 144.248 C 86.017 144.332,85.418 144.492,85.347 144.603 C 85.276 144.713,85.033 144.862,84.808 144.932 C 83.734 145.267,81.841 147.822,81.841 148.936 C 81.841 149.125,81.752 149.368,81.643 149.478 C 80.678 150.442,80.674 159.073,81.638 161.512 C 81.731 161.749,81.863 162.082,81.929 162.251 C 81.996 162.419,82.233 162.834,82.455 163.171 C 82.678 163.509,82.925 163.921,83.004 164.088 C 83.866 165.893,87.558 166.918,89.695 165.944 C 91.426 165.156,93.504 162.324,93.504 160.754 C 93.504 160.384,93.585 159.994,93.684 159.887 C 93.782 159.781,93.911 159.243,93.968 158.694 C 94.033 158.082,94.004 157.804,93.894 157.978 C 93.795 158.133,93.713 158.463,93.712 158.709 C 93.710 158.956,93.616 159.214,93.504 159.284 C 93.391 159.353,93.296 159.842,93.293 160.370 C 93.289 160.898,93.151 161.509,92.986 161.727 C 92.821 161.946,92.685 162.249,92.685 162.401 C 92.685 162.553,92.595 162.788,92.483 162.924 C 92.372 163.060,91.981 163.572,91.614 164.062 C 91.247 164.552,90.716 165.068,90.435 165.209 C 90.153 165.350,89.633 165.617,89.278 165.802 C 88.481 166.217,86.288 166.258,85.895 165.866 C 85.745 165.716,85.393 165.535,85.113 165.464 C 83.987 165.178,82.046 162.534,82.046 161.287 C 82.046 161.013,81.918 160.661,81.761 160.504 C 81.345 160.088,81.346 150.696,81.762 150.033 C 81.918 149.784,82.046 149.366,82.046 149.104 C 82.046 146.328,87.272 143.201,89.322 144.751 C 89.540 144.916,89.869 145.054,90.053 145.057 C 90.237 145.061,90.708 145.420,91.101 145.854 C 92.115 146.976,92.509 147.156,91.691 146.124 C 90.892 145.114,88.703 143.903,87.980 144.071 C 87.923 144.084,87.337 144.164,86.677 144.248 M285.900 144.254 C 284.021 144.626,281.330 147.275,281.330 148.753 C 281.330 148.986,281.204 149.425,281.050 149.729 C 280.229 151.351,280.256 159.488,281.088 161.168 C 281.188 161.370,281.408 161.857,281.578 162.251 C 282.411 164.186,282.893 164.820,284.001 165.438 C 284.389 165.654,284.771 165.922,284.851 166.034 C 285.118 166.407,288.231 166.426,288.793 166.058 C 289.069 165.877,289.447 165.729,289.634 165.729 C 290.098 165.729,291.622 164.099,292.054 163.139 C 292.249 162.707,292.532 162.077,292.683 161.739 C 293.202 160.575,293.431 159.486,293.350 158.568 L 293.268 157.647 293.233 158.607 C 293.213 159.135,293.105 159.624,292.992 159.693 C 292.880 159.763,292.788 160.171,292.788 160.601 C 292.788 161.046,292.656 161.492,292.481 161.637 C 292.312 161.777,292.174 162.058,292.174 162.261 C 292.174 162.464,292.036 162.769,291.867 162.938 C 291.698 163.106,291.560 163.338,291.560 163.453 C 291.560 163.855,289.800 165.524,289.376 165.524 C 289.142 165.524,288.836 165.662,288.696 165.831 C 287.762 166.956,283.628 165.551,282.676 163.785 C 282.555 163.560,282.400 163.330,282.333 163.274 C 282.266 163.217,282.149 162.918,282.074 162.609 C 281.998 162.299,281.846 162.046,281.735 162.046 C 281.625 162.046,281.535 161.857,281.535 161.627 C 281.535 161.396,281.409 160.959,281.256 160.655 C 280.667 159.487,280.687 150.427,281.279 150.230 C 281.424 150.182,281.535 149.805,281.535 149.356 C 281.535 148.922,281.627 148.509,281.739 148.440 C 281.852 148.370,281.944 148.177,281.944 148.010 C 281.944 146.489,284.891 144.450,287.091 144.450 C 288.883 144.450,291.560 146.027,291.560 147.083 C 291.560 147.183,291.698 147.379,291.867 147.519 C 292.036 147.659,292.177 147.970,292.180 148.209 C 292.184 148.449,292.322 148.823,292.487 149.042 C 292.653 149.260,292.788 149.725,292.788 150.075 C 292.788 150.425,292.875 150.798,292.981 150.905 C 293.087 151.012,293.208 151.606,293.250 152.225 L 293.326 153.350 293.364 152.069 C 293.385 151.364,293.314 150.627,293.208 150.432 C 293.102 150.237,292.959 149.731,292.892 149.309 C 292.824 148.887,292.681 148.542,292.574 148.542 C 292.466 148.542,292.379 148.354,292.379 148.124 C 292.379 146.535,288.611 143.754,286.877 144.063 C 286.808 144.076,286.369 144.162,285.900 144.254 M240.614 144.862 C 239.335 145.566,238.744 146.198,238.128 147.519 C 237.892 148.026,237.572 148.684,237.417 148.983 C 237.262 149.282,237.136 149.885,237.136 150.323 C 237.136 150.762,237.039 151.216,236.922 151.334 C 236.804 151.452,236.669 152.230,236.622 153.063 C 236.538 154.543,236.540 154.553,236.734 153.490 C 236.843 152.891,237.024 152.230,237.136 152.020 C 237.248 151.810,237.340 151.235,237.340 150.743 C 237.340 150.251,237.475 149.669,237.641 149.451 C 237.806 149.232,237.944 148.848,237.947 148.596 C 237.962 147.567,240.008 145.078,240.856 145.057 C 241.004 145.054,241.304 144.916,241.522 144.751 C 242.041 144.358,244.564 144.338,244.949 144.723 C 245.099 144.872,245.474 145.058,245.782 145.136 C 246.090 145.213,246.343 145.367,246.343 145.477 C 246.343 145.587,246.481 145.678,246.650 145.678 C 246.818 145.678,246.957 145.748,246.957 145.833 C 246.957 145.919,247.164 146.223,247.417 146.510 C 248.061 147.239,248.593 148.287,248.593 148.827 C 248.593 149.077,248.729 149.461,248.894 149.680 C 249.096 149.947,249.196 150.594,249.201 151.662 C 249.204 152.579,249.294 153.248,249.412 153.248 C 249.534 153.248,249.616 154.032,249.616 155.192 C 249.616 156.261,249.531 157.136,249.427 157.136 C 249.323 157.136,249.201 157.895,249.158 158.824 C 249.114 159.752,248.953 160.834,248.800 161.228 C 248.012 163.262,247.039 164.907,246.624 164.909 C 246.497 164.910,246.278 165.049,246.138 165.217 C 245.998 165.386,245.722 165.524,245.524 165.524 C 245.327 165.524,245.051 165.662,244.910 165.831 C 244.562 166.251,242.075 166.256,241.522 165.838 C 241.304 165.672,240.987 165.533,240.818 165.527 C 240.427 165.514,238.977 164.256,238.977 163.930 C 238.977 163.794,238.885 163.683,238.772 163.683 C 238.660 163.683,238.568 163.556,238.568 163.401 C 238.568 163.246,238.430 163.005,238.261 162.864 C 238.092 162.724,237.951 162.414,237.947 162.174 C 237.944 161.935,237.806 161.560,237.641 161.342 C 237.316 160.912,237.231 161.215,237.515 161.793 C 237.611 161.988,237.864 162.517,238.077 162.967 C 240.225 167.496,246.303 167.464,248.400 162.912 C 248.646 162.380,248.928 161.783,249.028 161.588 C 249.905 159.858,249.905 149.977,249.027 149.099 C 248.901 148.973,248.798 148.681,248.797 148.450 C 248.795 147.631,246.937 145.332,245.752 144.683 C 244.629 144.069,241.880 144.164,240.614 144.862 M130.230 144.697 C 127.829 145.315,126.380 146.597,125.694 148.711 C 125.524 149.237,125.284 149.944,125.162 150.281 C 125.040 150.619,124.920 151.586,124.894 152.430 L 124.848 153.964 124.999 152.576 C 125.081 151.813,125.256 151.081,125.388 150.950 C 125.519 150.818,125.627 150.406,125.627 150.033 C 125.627 149.660,125.711 149.195,125.815 149.000 C 125.918 148.804,126.202 148.236,126.446 147.736 C 126.889 146.826,127.981 145.687,128.415 145.681 C 128.542 145.679,128.760 145.540,128.900 145.371 C 129.370 144.805,133.017 144.945,134.001 145.566 C 135.086 146.251,136.261 147.495,136.272 147.971 C 136.276 148.116,136.414 148.414,136.579 148.632 C 136.745 148.851,136.880 149.231,136.880 149.477 C 136.880 149.723,137.024 150.271,137.201 150.694 C 137.616 151.686,137.560 159.812,137.136 160.236 C 136.995 160.376,136.880 160.742,136.880 161.049 C 136.880 161.356,136.742 161.746,136.573 161.915 C 136.404 162.083,136.266 162.370,136.266 162.552 C 136.266 162.733,136.177 162.993,136.068 163.129 C 135.058 164.394,134.537 164.912,134.156 165.031 C 133.910 165.107,133.648 165.264,133.574 165.380 C 133.341 165.743,129.140 165.620,128.716 165.236 C 128.518 165.057,128.264 164.910,128.151 164.910 C 127.555 164.910,125.629 161.857,125.627 160.910 C 125.627 160.680,125.513 160.377,125.373 160.238 C 125.213 160.078,125.075 159.027,124.999 157.384 L 124.877 154.783 124.843 157.050 C 124.785 160.860,126.113 164.055,128.267 165.286 C 129.518 166.000,132.186 166.410,132.481 165.934 C 132.550 165.821,132.867 165.729,133.184 165.729 C 133.501 165.729,133.875 165.591,134.015 165.422 C 134.155 165.253,134.358 165.115,134.465 165.115 C 134.721 165.115,135.857 163.977,135.857 163.720 C 135.857 163.611,135.995 163.469,136.164 163.404 C 136.332 163.339,136.471 163.093,136.471 162.856 C 136.471 162.620,136.609 162.288,136.777 162.119 C 136.946 161.950,137.084 161.607,137.084 161.356 C 137.084 161.105,137.199 160.785,137.340 160.645 C 137.531 160.454,137.596 159.097,137.596 155.295 C 137.596 151.492,137.531 150.135,137.340 149.944 C 137.199 149.803,137.084 149.519,137.084 149.312 C 137.084 146.794,132.936 144.001,130.230 144.697 M198.363 144.655 C 198.294 144.767,198.027 144.859,197.771 144.859 C 196.847 144.859,194.182 147.157,194.162 147.971 C 194.159 148.116,194.021 148.414,193.855 148.632 C 193.690 148.851,193.555 149.283,193.555 149.592 C 193.555 149.902,193.463 150.212,193.350 150.281 C 193.238 150.351,193.162 150.978,193.183 151.674 C 193.219 152.909,193.222 152.915,193.297 151.918 C 193.340 151.355,193.461 150.808,193.567 150.701 C 193.673 150.594,193.760 150.214,193.760 149.856 C 193.760 149.499,193.898 149.091,194.066 148.951 C 194.235 148.811,194.373 148.493,194.373 148.245 C 194.373 147.704,196.173 145.678,196.654 145.678 C 196.838 145.678,197.042 145.540,197.107 145.371 C 197.357 144.719,201.316 144.950,202.317 145.675 C 203.505 146.536,203.990 146.969,203.990 147.170 C 203.990 147.266,204.128 147.482,204.297 147.651 C 204.465 147.820,204.604 148.130,204.604 148.340 C 204.604 148.551,204.696 148.780,204.808 148.849 C 204.921 148.919,205.013 149.250,205.013 149.584 C 205.013 149.919,205.154 150.409,205.327 150.673 C 205.823 151.430,205.805 158.902,205.303 160.424 C 204.734 162.151,204.335 163.069,204.155 163.069 C 204.064 163.069,203.990 163.175,203.990 163.304 C 203.990 163.636,202.718 164.832,202.184 165.001 C 201.940 165.079,201.739 165.219,201.739 165.312 C 201.739 165.932,197.541 165.829,197.015 165.196 C 196.885 165.039,196.669 164.910,196.536 164.910 C 196.207 164.910,194.987 163.700,194.987 163.374 C 194.987 163.230,194.849 163.060,194.680 162.995 C 194.512 162.930,194.373 162.709,194.373 162.503 C 194.373 162.296,194.270 162.025,194.144 161.899 C 193.878 161.632,193.581 160.407,193.363 158.670 L 193.208 157.442 193.184 158.772 C 193.133 161.537,195.073 164.887,197.136 165.597 C 199.308 166.345,199.282 166.342,200.166 166.034 C 200.637 165.869,201.198 165.734,201.413 165.732 C 202.574 165.723,205.217 162.770,205.217 161.481 C 205.217 161.274,205.316 161.006,205.437 160.885 C 205.701 160.621,206.093 157.516,206.078 155.806 C 206.031 150.554,205.278 147.954,203.272 146.121 C 202.635 145.539,201.869 145.013,201.569 144.952 C 201.269 144.891,200.690 144.753,200.283 144.645 C 199.326 144.393,198.523 144.397,198.363 144.655 M226.547 145.007 C 226.407 145.057,226.292 145.263,226.292 145.465 C 226.292 145.667,226.153 145.947,225.985 146.087 C 225.816 146.227,225.675 146.584,225.671 146.879 C 225.668 147.175,225.530 147.596,225.364 147.814 C 225.199 148.032,225.064 148.464,225.064 148.774 C 225.064 149.083,224.980 149.389,224.877 149.452 C 224.774 149.516,224.625 150.281,224.545 151.152 C 224.466 152.024,224.312 152.848,224.202 152.985 C 223.969 153.275,224.120 156.947,224.427 158.465 C 224.598 159.309,224.619 159.052,224.545 157.005 C 224.449 154.328,224.755 150.202,225.073 149.884 C 225.180 149.776,225.269 149.402,225.269 149.052 C 225.269 148.702,225.404 148.237,225.569 148.019 C 225.734 147.800,225.872 147.426,225.876 147.186 C 225.879 146.947,226.020 146.636,226.189 146.496 C 226.358 146.356,226.496 146.030,226.496 145.772 C 226.496 145.514,226.611 145.262,226.752 145.211 C 226.893 145.161,226.962 145.074,226.905 145.018 C 226.849 144.961,226.688 144.956,226.547 145.007 M92.276 147.277 C 92.276 147.397,92.368 147.552,92.481 147.621 C 92.593 147.691,92.685 147.966,92.685 148.233 C 92.685 148.499,92.824 148.856,92.992 149.024 C 93.166 149.198,93.299 149.698,93.299 150.178 C 93.299 150.643,93.411 151.225,93.547 151.471 C 93.683 151.717,93.852 153.069,93.922 154.476 L 94.048 157.033 94.083 154.418 C 94.109 152.491,94.037 151.609,93.811 151.068 C 93.642 150.664,93.504 150.086,93.504 149.784 C 93.504 149.482,93.369 149.055,93.203 148.837 C 93.038 148.619,92.900 148.244,92.897 148.005 C 92.893 147.765,92.752 147.455,92.583 147.315 C 92.390 147.154,92.276 147.140,92.276 147.277 M305.622 151.816 C 305.847 154.744,305.771 157.438,305.408 159.386 C 305.039 161.369,304.842 162.639,305.003 161.995 C 305.052 161.798,305.165 161.637,305.254 161.637 C 305.342 161.637,305.475 161.065,305.548 160.367 C 305.621 159.669,305.772 159.006,305.884 158.894 C 306.142 158.635,306.156 151.969,305.898 151.703 C 305.794 151.596,305.663 151.233,305.606 150.895 C 305.550 150.558,305.557 150.972,305.622 151.816 M193.096 154.885 C 193.155 155.729,193.236 156.458,193.276 156.505 C 193.418 156.668,193.308 154.369,193.150 153.862 C 193.060 153.573,193.036 154.019,193.096 154.885 M112.168 155.908 C 112.153 157.090,112.235 158.471,112.349 158.977 C 112.464 159.483,112.632 160.411,112.723 161.038 C 112.814 161.665,112.992 162.373,113.119 162.610 C 113.246 162.848,113.350 163.359,113.350 163.747 C 113.350 164.134,113.488 164.566,113.657 164.706 C 113.826 164.846,113.964 165.074,113.964 165.214 C 113.964 165.552,115.196 167.859,115.422 167.945 C 115.521 167.983,115.601 168.132,115.601 168.277 C 115.601 168.516,117.190 170.089,118.866 171.509 C 119.232 171.818,119.746 172.072,120.009 172.072 C 120.272 172.072,120.544 172.164,120.614 172.276 C 120.683 172.389,120.896 172.476,121.086 172.470 C 121.277 172.464,120.834 172.172,120.102 171.822 C 117.440 170.549,114.702 167.187,113.806 164.092 C 113.692 163.698,113.451 162.903,113.270 162.325 C 113.089 161.748,112.941 160.890,112.941 160.419 C 112.941 159.949,112.827 159.363,112.688 159.117 C 112.548 158.871,112.380 157.565,112.315 156.215 L 112.195 153.760 112.168 155.908 M293.465 155.601 C 293.466 156.276,293.504 156.528,293.550 156.160 C 293.595 155.792,293.594 155.240,293.548 154.932 C 293.501 154.625,293.464 154.926,293.465 155.601 M236.562 156.215 C 236.547 157.373,236.660 158.183,237.104 160.102 L 237.293 160.921 237.317 159.887 C 237.330 159.319,237.243 158.757,237.124 158.638 C 237.006 158.520,236.834 157.650,236.743 156.705 C 236.588 155.098,236.576 155.066,236.562 156.215 M68.783 159.221 C 68.763 159.861,68.828 160.435,68.928 160.497 C 69.027 160.558,69.171 161.024,69.247 161.532 C 69.323 162.040,69.472 162.455,69.578 162.455 C 69.683 162.455,69.770 162.725,69.770 163.054 C 69.770 163.384,69.908 163.792,70.077 163.961 C 70.246 164.129,70.384 164.401,70.384 164.564 C 70.384 164.727,70.522 164.975,70.691 165.115 C 71.117 165.469,71.077 165.286,70.486 164.175 C 70.205 163.646,69.971 163.019,69.968 162.783 C 69.964 162.546,69.826 162.174,69.661 161.956 C 69.496 161.737,69.361 161.272,69.361 160.923 C 69.361 160.573,69.274 160.199,69.169 160.092 C 69.063 159.985,68.941 159.483,68.898 158.977 C 68.823 158.109,68.816 158.123,68.783 159.221 M363.286 159.073 C 363.504 159.238,363.853 159.376,364.061 159.380 C 364.268 159.383,364.683 159.517,364.981 159.677 C 365.280 159.837,365.939 160.164,366.445 160.403 C 368.501 161.375,368.884 161.803,368.893 163.140 C 368.904 164.707,367.459 166.138,365.866 166.138 C 365.554 166.138,365.212 166.222,365.105 166.325 C 364.998 166.428,364.680 166.560,364.399 166.618 C 364.118 166.675,364.256 166.692,364.706 166.654 C 367.636 166.408,369.109 165.249,369.098 163.198 C 369.089 161.498,368.887 161.276,366.117 159.902 C 365.317 159.506,364.517 159.182,364.338 159.182 C 364.160 159.182,363.957 159.090,363.887 158.977 C 363.818 158.864,363.565 158.772,363.325 158.772 C 362.897 158.772,362.896 158.778,363.286 159.073 M261.525 160.409 C 261.379 161.141,261.126 162.000,260.963 162.318 C 260.799 162.637,260.665 162.999,260.665 163.123 C 260.665 163.372,260.081 164.570,259.349 165.820 C 258.757 166.832,256.547 169.379,256.245 169.398 C 256.120 169.405,255.763 169.649,255.451 169.938 C 255.138 170.228,254.365 170.692,253.733 170.969 C 253.101 171.246,252.423 171.562,252.228 171.670 C 252.032 171.778,251.664 171.870,251.409 171.874 C 251.155 171.877,250.768 172.015,250.549 172.180 C 250.161 172.474,250.162 172.481,250.600 172.481 C 250.847 172.481,251.049 172.389,251.049 172.276 C 251.049 172.164,251.288 172.072,251.580 172.072 C 251.872 172.072,252.355 171.944,252.654 171.788 C 252.953 171.633,253.564 171.333,254.012 171.124 C 254.461 170.914,254.941 170.650,255.079 170.537 C 255.218 170.425,255.468 170.217,255.636 170.077 C 255.804 169.936,256.030 169.821,256.139 169.821 C 256.567 169.821,259.642 166.253,259.642 165.756 C 259.642 165.656,259.780 165.460,259.949 165.320 C 260.118 165.180,260.256 164.903,260.256 164.706 C 260.256 164.508,260.394 164.232,260.563 164.092 C 260.731 163.952,260.870 163.626,260.870 163.368 C 260.870 163.110,260.964 162.867,261.079 162.829 C 261.194 162.790,261.347 162.391,261.418 161.942 C 261.489 161.493,261.630 161.070,261.733 161.003 C 261.835 160.935,261.890 160.475,261.855 159.980 L 261.790 159.079 261.525 160.409 M224.664 160.244 C 224.659 160.659,224.747 161.056,224.859 161.125 C 224.972 161.195,225.064 161.505,225.064 161.814 C 225.064 162.124,225.199 162.556,225.364 162.774 C 225.530 162.993,225.668 163.413,225.671 163.709 C 225.675 164.005,225.816 164.361,225.985 164.501 C 226.153 164.641,226.292 164.883,226.292 165.038 C 226.292 165.193,226.382 165.320,226.492 165.320 C 226.603 165.320,226.751 165.550,226.821 165.831 C 226.892 166.113,227.026 166.343,227.118 166.343 C 227.211 166.343,227.338 166.504,227.401 166.702 C 227.690 167.611,231.042 170.571,232.200 170.938 C 232.439 171.014,232.634 171.162,232.634 171.267 C 232.634 171.372,232.853 171.458,233.121 171.458 C 233.388 171.458,233.722 171.596,233.862 171.765 C 234.002 171.934,234.376 172.072,234.693 172.072 C 235.010 172.072,235.327 172.164,235.396 172.276 C 235.466 172.389,235.725 172.479,235.971 172.478 C 236.584 172.473,236.086 172.149,235.011 171.852 C 233.271 171.370,230.921 170.072,229.770 168.956 C 228.620 167.841,227.519 166.572,227.519 166.362 C 227.519 166.239,227.433 166.138,227.328 166.138 C 227.223 166.138,227.073 165.931,226.994 165.678 C 226.915 165.425,226.794 165.171,226.724 165.115 C 226.600 165.014,226.259 164.312,225.605 162.806 C 225.420 162.381,225.267 161.828,225.265 161.579 C 225.264 161.329,225.130 160.757,224.968 160.307 L 224.673 159.488 224.664 160.244 M304.152 163.785 C 303.866 164.432,303.632 164.987,303.632 165.018 C 303.632 165.668,300.467 169.200,299.284 169.871 C 298.862 170.110,298.517 170.381,298.517 170.472 C 298.517 170.564,298.425 170.639,298.313 170.639 C 298.200 170.639,297.533 170.899,296.829 171.215 C 295.002 172.038,294.255 172.298,293.095 172.513 C 292.532 172.618,291.657 172.779,291.151 172.871 L 290.230 173.040 291.395 173.067 C 292.035 173.082,292.616 173.003,292.685 172.890 C 292.755 172.777,293.106 172.685,293.465 172.684 C 293.824 172.683,294.381 172.545,294.704 172.377 C 295.026 172.209,295.446 172.072,295.636 172.072 C 295.827 172.072,296.162 171.936,296.380 171.771 C 296.599 171.606,296.902 171.468,297.055 171.464 C 297.207 171.461,297.741 171.182,298.241 170.844 C 298.742 170.506,299.196 170.230,299.252 170.230 C 299.888 170.230,303.250 166.441,303.971 164.910 C 304.713 163.337,304.901 162.838,304.792 162.729 C 304.726 162.663,304.438 163.138,304.152 163.785 M379.657 163.510 C 379.480 163.865,379.335 164.491,379.335 164.903 C 379.335 165.314,379.200 165.829,379.035 166.048 C 378.869 166.266,378.730 166.583,378.726 166.752 C 378.721 166.921,378.306 167.519,377.804 168.082 C 377.302 168.645,376.888 169.167,376.885 169.243 C 376.861 169.838,372.407 172.080,370.435 172.490 C 369.985 172.584,369.294 172.748,368.900 172.856 L 368.184 173.053 368.939 173.074 C 369.355 173.085,369.744 173.015,369.804 172.917 C 369.865 172.820,370.350 172.691,370.884 172.630 C 371.417 172.570,371.887 172.420,371.929 172.296 C 371.970 172.173,372.208 172.072,372.459 172.072 C 372.709 172.072,373.093 171.936,373.311 171.771 C 373.530 171.606,373.906 171.468,374.147 171.464 C 374.388 171.461,374.638 171.320,374.703 171.151 C 374.768 170.982,374.962 170.844,375.134 170.844 C 375.307 170.844,375.448 170.752,375.448 170.639 C 375.448 170.527,375.563 170.434,375.703 170.434 C 376.109 170.432,378.312 168.207,378.312 167.799 C 378.312 167.697,378.450 167.561,378.619 167.496 C 378.788 167.432,378.929 167.215,378.932 167.014 C 378.936 166.814,379.074 166.471,379.239 166.252 C 379.404 166.034,379.540 165.510,379.540 165.088 C 379.540 164.666,379.621 164.270,379.721 164.209 C 379.879 164.111,380.167 162.864,380.031 162.864 C 380.002 162.864,379.834 163.155,379.657 163.510 M352.035 164.209 C 351.769 164.475,351.714 165.109,351.714 167.892 C 351.714 171.577,351.870 172.072,353.031 172.072 C 353.306 172.072,353.588 172.164,353.657 172.276 C 353.727 172.389,354.032 172.477,354.334 172.473 C 354.872 172.465,354.869 172.458,354.196 172.166 C 353.818 172.002,353.292 171.867,353.027 171.867 C 352.203 171.867,352.054 171.228,352.077 167.777 C 352.100 164.225,352.189 164.054,353.654 164.756 C 354.475 165.149,355.524 165.517,356.514 165.758 C 356.959 165.866,357.420 166.033,357.537 166.128 C 357.744 166.297,358.961 166.473,361.023 166.634 C 361.586 166.678,361.770 166.669,361.432 166.615 C 361.095 166.560,360.731 166.431,360.624 166.327 C 360.517 166.223,359.861 166.138,359.166 166.138 C 358.292 166.138,357.823 166.043,357.647 165.831 C 357.507 165.662,357.093 165.524,356.726 165.524 C 356.360 165.524,355.946 165.386,355.806 165.217 C 355.666 165.049,355.240 164.910,354.860 164.910 C 354.480 164.910,354.169 164.818,354.169 164.706 C 354.169 164.593,354.002 164.501,353.799 164.501 C 353.595 164.501,353.250 164.366,353.031 164.201 C 352.524 163.817,352.426 163.818,352.035 164.209 M71.004 165.653 C 71.001 165.780,71.136 165.998,71.304 166.138 C 71.473 166.278,71.611 166.485,71.611 166.597 C 71.611 166.907,74.511 169.821,74.820 169.821 C 74.968 169.821,75.090 169.892,75.090 169.979 C 75.090 170.066,75.435 170.315,75.857 170.532 C 76.279 170.749,76.762 171.033,76.931 171.164 C 77.100 171.295,77.698 171.564,78.261 171.762 C 78.824 171.960,79.574 172.248,79.929 172.403 C 80.283 172.559,80.794 172.685,81.064 172.685 C 81.334 172.685,81.653 172.783,81.772 172.903 C 81.906 173.036,83.592 173.148,86.161 173.194 L 90.332 173.268 86.418 173.099 C 84.265 173.006,82.315 172.829,82.084 172.706 C 81.853 172.582,81.419 172.481,81.119 172.481 C 80.820 172.481,80.330 172.351,80.032 172.193 C 79.733 172.035,79.028 171.744,78.465 171.546 C 77.903 171.348,77.099 170.971,76.679 170.708 C 76.259 170.445,75.855 170.230,75.780 170.230 C 75.415 170.230,73.088 168.099,72.225 166.975 C 71.169 165.600,71.011 165.428,71.004 165.653 M103.376 166.274 C 103.235 166.330,103.120 166.487,103.120 166.622 C 103.120 166.954,100.480 169.616,100.151 169.616 C 100.008 169.616,99.837 169.754,99.773 169.923 C 99.708 170.092,99.553 170.230,99.429 170.230 C 99.305 170.230,99.065 170.368,98.897 170.537 C 98.412 171.021,98.820 170.895,99.558 170.332 C 99.927 170.051,100.304 169.821,100.397 169.821 C 100.620 169.821,102.918 167.418,103.381 166.701 C 103.580 166.391,103.718 166.145,103.688 166.154 C 103.657 166.163,103.517 166.217,103.376 166.274 M137.442 167.729 C 137.246 167.771,137.084 167.906,137.084 168.031 C 137.084 168.155,136.342 168.977,135.436 169.857 C 134.529 170.737,133.890 171.458,134.015 171.458 C 134.141 171.458,134.975 170.721,135.869 169.821 C 136.763 168.921,137.573 168.184,137.669 168.184 C 137.844 168.184,138.103 170.276,138.106 171.704 C 138.108 172.688,138.301 172.723,143.223 172.638 L 147.008 172.573 142.872 172.527 C 138.048 172.473,138.429 172.686,138.207 169.923 C 138.042 167.866,137.956 167.621,137.442 167.729 M192.614 168.060 C 192.554 168.217,192.541 168.701,192.586 169.134 L 192.668 169.923 192.702 169.076 C 192.745 168.022,193.180 167.790,193.679 168.555 C 194.160 169.289,195.507 170.572,196.463 171.204 C 196.889 171.486,197.238 171.797,197.238 171.894 C 197.238 171.992,197.445 172.075,197.698 172.078 C 197.951 172.082,198.337 172.220,198.556 172.385 C 198.774 172.550,199.147 172.685,199.384 172.685 C 199.622 172.685,199.911 172.781,200.028 172.898 C 200.304 173.174,205.498 173.388,206.503 173.164 C 207.044 173.044,206.365 172.992,204.253 172.992 C 201.264 172.992,200.114 172.816,198.807 172.158 C 198.488 171.998,198.137 171.867,198.026 171.867 C 197.915 171.867,197.523 171.637,197.154 171.355 C 196.785 171.074,196.412 170.844,196.325 170.844 C 196.132 170.844,194.229 168.870,193.811 168.235 C 193.473 167.722,192.783 167.621,192.614 168.060 M97.801 171.048 C 97.105 171.455,96.079 171.867,95.762 171.867 C 95.260 171.867,94.497 172.465,94.987 172.474 C 95.184 172.478,95.345 172.389,95.345 172.276 C 95.345 172.164,95.604 172.072,95.920 172.072 C 96.236 172.072,96.673 171.936,96.892 171.771 C 97.110 171.606,97.439 171.468,97.622 171.464 C 97.805 171.461,98.070 171.320,98.210 171.151 C 98.488 170.815,98.285 170.764,97.801 171.048 M192.358 171.300 C 192.297 172.402,191.799 172.511,187.141 172.442 C 184.832 172.407,183.076 172.453,183.239 172.544 C 183.402 172.634,185.418 172.681,187.720 172.646 C 192.354 172.576,192.650 172.495,192.477 171.332 L 192.389 170.742 192.358 171.300 M132.617 171.761 C 132.354 171.906,132.037 172.127,131.911 172.253 C 131.786 172.378,131.448 172.484,131.161 172.487 C 130.874 172.491,130.461 172.629,130.242 172.794 C 129.854 173.088,129.855 173.095,130.293 173.095 C 130.540 173.095,130.742 173.003,130.742 172.890 C 130.742 172.777,131.011 172.685,131.341 172.685 C 131.670 172.685,132.078 172.547,132.247 172.379 C 132.416 172.210,132.687 172.072,132.850 172.072 C 133.013 172.072,133.261 171.934,133.402 171.765 C 133.726 171.374,133.323 171.372,132.617 171.761 M92.982 172.674 C 92.875 172.781,92.235 172.901,91.560 172.942 L 90.332 173.017 91.816 173.056 C 92.632 173.077,93.299 173.008,93.299 172.903 C 93.299 172.798,93.598 172.674,93.964 172.629 L 94.629 172.546 93.903 172.514 C 93.503 172.496,93.089 172.568,92.982 172.674 M121.841 172.631 C 122.066 172.687,122.301 172.813,122.363 172.911 C 122.425 173.009,123.853 173.131,125.535 173.182 L 128.593 173.274 125.742 173.085 C 124.174 172.981,122.798 172.803,122.683 172.689 C 122.569 172.574,122.241 172.491,121.954 172.505 C 121.528 172.524,121.507 172.547,121.841 172.631 M237.084 172.624 C 237.338 172.673,237.545 172.799,237.545 172.904 C 237.545 173.009,237.982 173.084,238.517 173.071 L 239.488 173.048 238.670 172.855 C 238.220 172.749,237.575 172.634,237.238 172.599 C 236.900 172.564,236.831 172.576,237.084 172.624 M248.726 172.621 C 248.649 172.698,248.196 172.825,247.720 172.902 L 246.854 173.043 247.785 173.069 C 248.297 173.083,248.804 173.010,248.910 172.907 C 249.017 172.804,249.335 172.679,249.616 172.628 C 250.067 172.547,250.053 172.533,249.497 172.509 C 249.150 172.493,248.803 172.544,248.726 172.621 M355.601 172.628 C 355.882 172.679,356.200 172.804,356.307 172.907 C 356.414 173.010,357.104 173.078,357.841 173.057 L 359.182 173.019 358.056 172.943 C 357.437 172.901,356.843 172.780,356.737 172.674 C 356.630 172.568,356.215 172.493,355.816 172.509 C 355.257 172.530,355.207 172.558,355.601 172.628 M363.274 173.088 C 359.747 173.187,359.557 173.210,361.229 173.334 C 363.372 173.493,367.263 173.320,367.263 173.065 C 367.263 172.969,367.240 172.910,367.212 172.934 C 367.184 172.959,365.412 173.028,363.274 173.088 M240.818 173.336 C 242.302 173.578,243.496 173.580,245.115 173.342 C 246.269 173.172,245.998 173.147,243.069 173.149 C 240.369 173.152,239.918 173.189,240.818 173.336 M285.687 173.247 C 286.564 173.285,287.945 173.285,288.756 173.246 C 289.567 173.208,288.849 173.176,287.161 173.176 C 285.473 173.177,284.810 173.208,285.687 173.247 " stroke="none" fill="#72b670" fill-rule="evenodd"></path>
                    <path id="path3" d="M196.419 19.558 C 192.184 19.817,190.769 19.990,189.463 20.411 C 189.069 20.537,187.872 20.923,186.803 21.267 C 185.734 21.611,184.706 21.893,184.518 21.893 C 184.330 21.893,183.916 22.024,183.597 22.186 C 183.279 22.347,181.637 23.148,179.949 23.966 C 178.261 24.784,176.595 25.665,176.247 25.923 C 175.898 26.182,175.518 26.394,175.402 26.394 C 175.286 26.394,175.068 26.541,174.919 26.722 C 174.769 26.902,174.183 27.354,173.615 27.726 C 173.047 28.098,172.261 28.693,171.867 29.049 C 171.473 29.404,170.743 30.034,170.245 30.448 C 168.976 31.504,165.967 34.636,165.224 35.673 C 164.883 36.150,164.489 36.674,164.350 36.838 C 163.417 37.931,162.277 39.552,161.766 40.512 C 159.981 43.870,158.363 47.176,158.363 47.467 C 158.363 47.650,158.228 47.978,158.063 48.196 C 157.898 48.415,157.759 48.731,157.755 48.900 C 157.750 49.069,157.609 49.471,157.441 49.793 C 157.273 50.116,157.136 50.596,157.136 50.860 C 157.136 51.125,157.008 51.644,156.851 52.014 C 155.892 54.278,155.110 62.064,155.453 65.931 C 155.791 69.741,156.054 71.530,156.546 73.381 C 156.781 74.265,157.047 75.309,157.137 75.703 C 157.347 76.620,158.221 78.945,158.877 80.330 C 159.157 80.922,159.386 81.533,159.386 81.687 C 159.386 81.842,159.521 82.147,159.687 82.365 C 159.852 82.583,159.990 82.916,159.993 83.103 C 159.997 83.291,160.082 83.475,160.183 83.512 C 160.352 83.576,161.015 84.681,162.065 86.650 C 162.534 87.529,163.882 89.399,164.646 90.228 C 164.904 90.508,165.115 90.856,165.115 91.002 C 165.115 91.396,170.789 96.961,172.134 97.886 C 172.775 98.326,173.299 98.764,173.299 98.858 C 173.299 98.951,173.423 99.028,173.574 99.028 C 173.726 99.028,174.012 99.208,174.211 99.428 C 174.410 99.647,175.230 100.215,176.033 100.690 C 176.836 101.165,177.524 101.629,177.562 101.723 C 177.599 101.816,177.783 101.897,177.971 101.901 C 178.159 101.906,178.680 102.136,179.130 102.411 C 179.581 102.686,180.133 102.994,180.358 103.095 C 180.583 103.197,181.274 103.510,181.893 103.792 C 182.512 104.073,183.801 104.556,184.757 104.865 C 185.714 105.174,186.635 105.493,186.806 105.574 C 187.475 105.895,189.628 106.455,190.793 106.611 C 191.468 106.701,192.297 106.833,192.634 106.905 C 193.218 107.028,193.228 107.019,192.851 106.714 C 192.605 106.516,192.050 106.394,191.394 106.394 C 190.812 106.394,189.701 106.176,188.927 105.911 C 186.124 104.949,185.047 104.596,184.143 104.344 C 183.637 104.204,182.532 103.734,181.688 103.301 C 180.844 102.868,179.601 102.248,178.926 101.922 C 178.251 101.597,177.481 101.095,177.216 100.808 C 176.942 100.511,176.401 100.228,175.969 100.155 C 175.361 100.052,175.137 99.885,174.876 99.337 C 174.662 98.889,174.275 98.530,173.770 98.311 C 173.342 98.126,172.688 97.826,172.315 97.644 C 171.348 97.172,167.564 93.409,167.386 92.742 C 167.290 92.383,166.918 91.999,166.341 91.661 C 165.668 91.268,165.399 90.960,165.263 90.428 C 165.164 90.038,164.834 89.488,164.530 89.207 C 163.600 88.345,162.097 86.085,161.637 84.857 C 161.397 84.215,160.890 83.371,160.510 82.979 C 159.885 82.336,159.394 81.215,159.385 80.409 C 159.383 80.240,159.163 79.720,158.896 79.253 C 158.362 78.320,157.653 76.248,157.447 75.020 C 157.374 74.589,157.146 73.898,156.939 73.486 C 156.709 73.026,156.472 71.828,156.325 70.384 C 156.194 69.090,155.996 67.386,155.885 66.598 C 155.655 64.966,155.675 61.611,155.923 60.283 C 156.015 59.790,156.108 58.583,156.130 57.599 C 156.182 55.243,156.704 53.388,157.028 54.409 C 157.203 54.960,157.954 54.982,157.954 54.436 C 157.954 54.218,157.762 53.713,157.527 53.316 C 157.219 52.793,157.136 52.407,157.228 51.923 C 157.540 50.286,157.838 49.381,158.197 48.981 C 158.409 48.745,158.656 48.090,158.745 47.528 C 158.834 46.965,159.094 46.238,159.324 45.912 C 159.892 45.106,162.251 40.451,162.251 40.136 C 162.251 39.996,162.665 39.480,163.171 38.988 C 163.678 38.495,164.092 37.962,164.092 37.801 C 164.092 37.641,164.368 37.264,164.706 36.963 C 165.043 36.662,165.320 36.329,165.320 36.223 C 165.320 36.116,165.711 35.626,166.189 35.134 C 166.668 34.642,167.628 33.647,168.324 32.925 C 169.587 31.612,170.882 30.465,172.327 29.378 C 172.749 29.060,173.097 28.696,173.099 28.569 C 173.104 28.309,175.097 27.011,176.106 26.611 C 176.468 26.467,176.874 26.217,177.008 26.055 C 177.143 25.893,177.767 25.524,178.396 25.234 C 180.268 24.371,182.967 23.008,183.734 22.538 C 184.128 22.296,184.773 22.098,185.168 22.098 C 185.998 22.097,186.391 21.988,189.121 20.999 C 193.076 19.567,203.094 19.277,207.503 20.467 C 208.328 20.690,209.659 20.960,210.462 21.067 C 211.265 21.175,212.232 21.393,212.610 21.553 C 212.989 21.712,213.852 22.011,214.527 22.216 C 215.202 22.421,216.123 22.816,216.573 23.094 C 217.350 23.574,218.938 24.154,219.419 24.134 C 219.665 24.123,216.473 22.516,216.195 22.510 C 216.099 22.508,215.731 22.375,215.376 22.215 C 214.483 21.812,211.648 20.887,210.537 20.637 C 207.382 19.927,206.486 19.790,204.085 19.649 C 202.618 19.563,201.237 19.450,201.016 19.398 C 200.795 19.345,198.726 19.418,196.419 19.558 M219.830 24.321 C 220.046 24.670,223.704 27.177,224.934 27.819 C 225.250 27.984,225.794 28.480,226.144 28.921 C 226.493 29.362,227.287 30.048,227.908 30.445 C 228.530 30.843,229.502 31.613,230.069 32.157 C 230.636 32.700,231.161 33.145,231.236 33.146 C 231.311 33.146,231.721 33.629,232.148 34.220 C 232.575 34.811,233.411 35.801,234.005 36.419 C 234.598 37.038,235.086 37.692,235.087 37.872 C 235.093 38.656,236.735 41.125,237.250 41.125 C 237.477 41.125,238.363 42.893,238.363 43.346 C 238.363 43.513,239.206 45.195,239.994 46.600 C 240.104 46.796,240.329 47.417,240.494 47.980 C 240.659 48.542,241.045 49.693,241.352 50.537 C 242.867 54.707,243.905 63.413,243.279 66.701 C 243.161 67.320,242.936 69.069,242.777 70.588 C 242.504 73.218,242.364 73.923,241.884 75.090 C 241.769 75.371,241.512 76.153,241.314 76.829 C 240.890 78.272,240.377 79.454,239.802 80.307 C 239.575 80.645,239.388 81.090,239.388 81.298 C 239.387 81.505,239.210 81.899,238.995 82.172 C 238.779 82.446,238.483 83.137,238.337 83.708 C 238.160 84.398,237.823 84.995,237.329 85.493 C 236.922 85.904,236.424 86.673,236.224 87.203 C 236.005 87.781,235.501 88.491,234.963 88.981 C 234.470 89.430,234.066 89.919,234.066 90.068 C 234.066 90.434,232.258 92.605,231.585 93.048 C 231.289 93.242,230.661 93.890,230.189 94.488 C 229.718 95.085,228.956 95.822,228.497 96.125 C 228.038 96.427,227.285 97.056,226.823 97.522 C 226.362 97.987,225.565 98.607,225.052 98.900 C 224.538 99.192,223.903 99.660,223.640 99.940 C 223.377 100.220,222.691 100.586,222.115 100.753 C 221.452 100.946,220.814 101.320,220.375 101.773 C 219.994 102.166,219.397 102.544,219.048 102.612 C 218.175 102.784,217.289 103.139,217.289 103.319 C 217.289 103.485,216.442 103.853,214.322 104.607 C 213.535 104.887,212.447 105.276,211.906 105.470 C 211.364 105.664,210.969 105.871,211.028 105.930 C 211.086 105.988,211.508 105.886,211.965 105.703 C 212.422 105.520,213.019 105.371,213.291 105.371 C 213.564 105.371,213.836 105.291,213.897 105.193 C 213.957 105.095,214.584 104.805,215.290 104.550 C 218.969 103.216,226.309 98.964,227.315 97.584 C 227.371 97.506,227.759 97.212,228.177 96.930 C 229.137 96.282,230.179 95.408,230.179 95.252 C 230.179 95.186,230.801 94.494,231.560 93.713 C 233.150 92.080,233.213 92.008,234.572 90.230 C 235.131 89.499,235.719 88.766,235.879 88.601 C 236.039 88.437,236.296 88.000,236.451 87.630 C 236.605 87.259,236.823 86.957,236.934 86.957 C 237.045 86.957,237.136 86.855,237.136 86.730 C 237.136 86.606,237.412 86.155,237.749 85.729 C 238.087 85.303,238.363 84.851,238.363 84.725 C 238.363 84.518,238.479 84.253,238.999 83.274 C 239.239 82.821,239.993 81.230,240.357 80.409 C 240.531 80.015,240.738 79.555,240.817 79.386 C 240.895 79.217,241.170 78.389,241.427 77.545 C 241.685 76.701,241.965 75.918,242.050 75.806 C 242.135 75.693,242.269 75.210,242.348 74.733 C 242.426 74.255,242.575 73.812,242.678 73.749 C 242.780 73.685,242.864 73.237,242.864 72.752 C 242.864 72.268,242.965 71.376,243.087 70.770 C 243.844 67.021,243.905 58.200,243.191 55.754 C 243.027 55.192,242.784 54.225,242.650 53.606 C 242.517 52.987,242.249 51.974,242.055 51.355 C 241.860 50.737,241.588 49.816,241.449 49.309 C 241.310 48.803,241.066 48.128,240.905 47.810 C 240.745 47.491,240.616 47.123,240.620 46.991 C 240.624 46.794,239.864 45.130,239.154 43.785 C 239.065 43.616,238.785 43.064,238.532 42.558 C 237.761 41.017,234.781 36.576,233.908 35.666 C 233.456 35.195,232.950 34.616,232.784 34.379 C 232.093 33.393,229.535 30.901,228.542 30.248 C 228.261 30.063,227.542 29.447,226.945 28.879 C 226.012 27.993,223.228 25.985,222.932 25.985 C 222.878 25.985,222.425 25.708,221.924 25.371 C 221.424 25.033,220.924 24.757,220.814 24.757 C 220.703 24.757,220.498 24.619,220.358 24.450 C 220.089 24.126,219.642 24.017,219.830 24.321 M172.731 43.589 C 171.744 43.985,170.876 45.067,171.096 45.627 C 171.221 45.946,171.300 52.465,171.307 62.945 C 171.314 75.472,171.379 79.900,171.561 80.336 C 171.753 80.796,171.814 77.076,171.848 62.916 C 171.875 51.307,171.962 44.838,172.094 44.706 C 172.218 44.581,173.989 44.509,176.635 44.520 C 180.624 44.537,180.914 44.515,180.256 44.239 C 179.696 44.005,179.003 43.967,177.084 44.066 C 174.853 44.181,174.573 44.155,174.015 43.785 C 173.325 43.328,173.365 43.334,172.731 43.589 M200.309 44.604 C 200.194 44.885,200.106 45.483,200.112 45.934 C 200.129 46.996,200.159 54.940,200.150 55.806 C 200.138 56.932,200.126 58.907,200.127 59.284 C 200.128 59.481,200.115 64.338,200.098 70.077 C 200.080 75.816,200.134 80.682,200.216 80.889 C 200.470 81.530,202.062 82.089,202.940 81.846 C 203.915 81.575,205.356 81.582,206.583 81.864 C 207.386 82.048,207.762 82.030,208.593 81.766 L 209.616 81.441 208.696 81.456 C 204.346 81.524,201.168 81.406,200.839 81.166 C 200.362 80.817,200.286 45.078,200.761 44.776 C 201.076 44.576,203.323 44.496,207.059 44.553 L 209.821 44.594 208.286 44.299 C 205.535 43.771,200.573 43.960,200.309 44.604 M210.113 44.794 C 210.353 44.947,210.395 45.766,210.353 49.476 C 210.324 51.950,210.364 54.391,210.440 54.900 L 210.579 55.826 211.325 55.412 C 211.736 55.183,212.210 54.890,212.379 54.760 C 216.957 51.228,225.072 53.861,227.905 59.797 C 229.738 63.638,230.123 70.590,228.675 73.695 C 228.377 74.335,228.133 74.960,228.133 75.084 C 228.133 75.430,227.549 76.308,226.496 77.545 C 226.161 77.939,225.837 78.399,225.777 78.568 C 225.548 79.210,223.301 80.605,220.709 81.715 C 219.024 82.436,215.088 82.071,213.166 81.014 C 212.867 80.850,212.154 80.467,211.580 80.162 L 210.537 79.608 210.537 80.111 C 210.537 80.387,210.353 80.798,210.128 81.023 C 209.599 81.552,209.912 81.546,210.821 81.010 C 211.607 80.546,211.925 80.622,213.027 81.538 C 214.104 82.433,218.946 82.765,221.007 82.085 C 222.528 81.583,224.872 79.989,225.979 78.704 C 228.436 75.850,228.747 75.414,228.747 74.819 C 228.747 74.488,228.945 73.896,229.188 73.503 C 230.144 71.956,229.933 63.301,228.886 61.105 C 228.610 60.525,228.101 59.449,227.756 58.714 C 227.358 57.867,226.844 57.154,226.355 56.770 C 225.931 56.437,225.121 55.722,224.556 55.181 C 221.935 52.674,222.346 52.827,218.414 52.890 L 215.141 52.942 213.544 53.683 C 210.709 54.999,210.529 54.866,210.617 51.526 C 210.655 50.110,210.739 48.865,210.804 48.760 C 210.869 48.655,210.824 48.179,210.703 47.703 C 210.520 46.984,210.545 46.700,210.846 46.032 C 211.257 45.119,211.043 44.601,210.256 44.607 C 209.918 44.609,209.886 44.651,210.113 44.794 M181.748 51.100 L 181.777 57.391 181.838 51.996 C 181.895 46.990,181.929 46.560,182.307 46.028 C 182.713 45.459,182.492 44.808,181.894 44.808 C 181.798 44.808,181.732 47.639,181.748 51.100 M194.967 53.286 C 194.918 53.335,193.682 53.399,192.221 53.428 C 188.071 53.511,187.920 53.774,192.020 53.780 C 198.615 53.790,198.218 53.762,198.364 54.223 C 198.526 54.732,197.862 55.873,196.788 56.931 C 196.360 57.353,196.010 57.746,196.010 57.805 C 196.010 57.923,192.886 61.752,192.039 62.673 C 191.747 62.989,191.509 63.284,191.509 63.327 C 191.509 63.371,191.279 63.654,190.997 63.958 C 190.479 64.517,190.307 65.543,190.691 65.780 C 190.803 65.850,190.895 66.081,190.895 66.293 C 190.895 66.506,191.171 67.090,191.509 67.590 C 191.847 68.090,192.123 68.552,192.123 68.616 C 192.123 68.680,192.642 69.587,193.278 70.632 C 193.913 71.677,194.797 73.223,195.242 74.066 C 195.687 74.910,196.351 76.107,196.718 76.726 C 199.707 81.770,199.986 81.315,193.862 81.391 L 188.951 81.451 189.812 81.853 C 190.626 82.233,190.718 82.236,191.504 81.922 C 192.137 81.669,192.662 81.623,193.712 81.729 C 198.501 82.214,200.268 81.609,198.984 79.925 C 198.706 79.561,198.249 78.744,197.969 78.109 C 197.688 77.475,197.140 76.538,196.750 76.028 C 196.361 75.518,195.894 74.592,195.714 73.970 C 195.533 73.348,195.305 72.839,195.208 72.839 C 195.111 72.839,194.970 72.594,194.895 72.295 C 194.820 71.995,194.488 71.422,194.157 71.020 C 193.826 70.619,193.555 70.214,193.555 70.121 C 193.555 70.028,193.103 69.243,192.550 68.377 C 190.697 65.476,190.731 64.673,192.801 62.404 C 193.468 61.673,194.163 60.844,194.345 60.563 C 194.526 60.281,194.935 59.775,195.252 59.437 C 195.569 59.100,195.954 58.593,196.107 58.312 C 196.260 58.031,196.765 57.444,197.228 57.009 C 197.692 56.574,198.201 55.906,198.360 55.526 C 198.519 55.145,198.746 54.834,198.864 54.834 C 199.328 54.834,199.048 54.101,198.488 53.854 C 197.643 53.480,195.171 53.081,194.967 53.286 M187.724 53.770 C 186.970 53.933,186.189 54.635,186.189 55.150 C 186.189 55.495,185.622 56.229,184.299 57.592 C 182.368 59.582,181.893 59.879,181.893 59.096 C 181.893 58.853,181.837 58.709,181.769 58.777 C 181.701 58.845,181.709 59.451,181.787 60.125 L 181.929 61.349 183.280 59.677 C 184.024 58.757,184.689 57.959,184.760 57.903 C 184.830 57.847,185.368 57.156,185.956 56.368 C 187.411 54.418,187.691 54.096,188.038 53.973 C 188.462 53.823,188.215 53.664,187.724 53.770 M193.402 54.780 C 194.049 54.821,195.107 54.821,195.754 54.780 C 196.402 54.740,195.872 54.707,194.578 54.707 C 193.284 54.707,192.754 54.740,193.402 54.780 M213.328 62.302 C 213.263 62.471,213.072 62.609,212.904 62.609 C 212.365 62.609,211.216 63.802,210.780 64.815 C 209.008 68.935,211.218 73.248,215.102 73.248 C 216.402 73.248,218.107 72.434,218.107 71.815 C 218.107 71.703,218.239 71.611,218.401 71.611 C 218.562 71.611,218.752 71.427,218.824 71.202 C 218.895 70.977,219.022 70.793,219.106 70.793 C 220.023 70.793,219.854 65.174,218.905 64.147 C 218.696 63.920,218.305 63.490,218.037 63.191 C 217.016 62.053,213.666 61.421,213.328 62.302 M217.347 63.161 C 217.589 63.476,218.080 64.010,218.438 64.348 C 219.074 64.948,219.092 65.012,219.234 67.337 L 219.380 69.711 218.437 70.500 C 217.918 70.934,217.494 71.437,217.494 71.619 C 217.494 73.031,213.523 73.574,213.093 72.221 C 213.026 72.007,212.617 71.553,212.186 71.211 C 211.174 70.410,210.462 68.932,210.612 67.943 C 211.228 63.875,211.212 63.909,212.849 63.133 C 215.059 62.086,216.528 62.095,217.347 63.161 M183.108 73.642 C 181.771 74.468,181.657 74.703,181.707 76.550 C 181.852 81.858,182.197 81.517,176.731 81.452 C 173.787 81.418,172.284 81.323,172.076 81.161 C 171.828 80.967,171.833 81.018,172.101 81.432 C 172.384 81.867,172.566 81.935,173.326 81.888 C 176.960 81.663,179.639 81.694,179.864 81.964 C 181.105 83.461,182.829 79.279,182.082 76.581 C 181.752 75.386,181.962 74.738,182.814 74.332 C 183.528 73.992,184.348 74.312,184.348 74.931 C 184.348 75.035,184.855 76.002,185.475 77.082 C 186.095 78.161,186.708 79.398,186.837 79.829 C 186.967 80.261,187.158 80.614,187.264 80.614 C 187.369 80.614,187.689 80.798,187.975 81.023 C 188.261 81.248,188.587 81.432,188.700 81.432 C 188.812 81.432,188.667 81.246,188.378 81.018 C 188.088 80.790,187.690 80.238,187.492 79.790 C 187.295 79.343,187.059 78.977,186.968 78.977 C 186.877 78.977,186.803 78.870,186.803 78.740 C 186.803 78.610,186.251 77.604,185.575 76.505 C 184.900 75.407,184.348 74.446,184.348 74.371 C 184.348 73.766,183.610 73.332,183.108 73.642 M211.519 102.957 C 211.710 103.147,211.819 103.147,212.010 102.957 C 212.201 102.766,212.147 102.711,211.765 102.711 C 211.383 102.711,211.328 102.766,211.519 102.957 M209.156 106.330 C 209.353 106.382,209.675 106.382,209.872 106.330 C 210.069 106.279,209.908 106.237,209.514 106.237 C 209.120 106.237,208.959 106.279,209.156 106.330 M204.706 106.764 C 204.010 107.054,203.120 107.102,198.772 107.084 C 195.167 107.069,194.080 107.112,195.090 107.231 C 199.021 107.694,202.325 107.594,206.343 106.891 C 208.907 106.442,208.894 106.449,207.161 106.436 C 206.070 106.427,205.251 106.537,204.706 106.764 M31.406 122.969 C 31.118 123.433,31.284 171.730,31.574 172.020 C 32.040 172.486,41.954 172.409,42.300 171.936 C 42.481 171.689,42.558 170.632,42.560 168.401 C 42.565 160.304,42.685 157.329,43.019 156.995 C 43.526 156.488,44.972 158.013,46.064 160.205 C 46.316 160.711,46.789 161.402,47.114 161.739 C 47.440 162.077,47.969 162.880,48.290 163.524 C 48.611 164.168,48.976 164.813,49.100 164.956 C 49.511 165.433,51.151 168.037,51.151 168.214 C 51.151 168.310,51.237 168.389,51.342 168.389 C 51.447 168.389,51.597 168.596,51.677 168.849 C 51.756 169.102,52.038 169.570,52.304 169.888 C 52.570 170.206,52.789 170.574,52.791 170.706 C 52.797 171.089,53.757 171.897,54.517 172.158 C 55.111 172.362,58.959 172.406,65.546 172.283 C 66.109 172.273,65.826 171.389,64.844 170.086 C 64.402 169.500,64.041 168.964,64.041 168.894 C 64.041 168.825,63.926 168.647,63.785 168.499 C 63.645 168.351,63.355 167.989,63.143 167.695 C 62.930 167.402,62.631 167.161,62.478 167.161 C 62.325 167.161,62.199 166.977,62.199 166.752 C 62.199 166.527,62.130 166.342,62.046 166.342 C 61.962 166.342,61.637 165.859,61.325 165.268 C 61.013 164.678,60.461 163.861,60.098 163.455 C 59.735 163.048,59.207 162.329,58.926 161.857 C 58.645 161.386,57.286 159.468,55.908 157.595 C 54.529 155.722,53.402 154.076,53.402 153.937 C 53.402 153.441,53.814 152.612,54.282 152.166 C 54.543 151.917,55.346 150.931,56.067 149.974 C 57.381 148.231,57.619 147.923,58.012 147.461 C 58.128 147.324,58.442 146.890,58.709 146.496 C 58.976 146.102,59.537 145.412,59.956 144.962 C 60.376 144.512,61.091 143.591,61.545 142.916 C 61.999 142.240,62.614 141.459,62.912 141.180 C 63.209 140.901,63.649 140.348,63.890 139.952 C 64.130 139.557,64.562 139.026,64.849 138.773 L 65.371 138.313 64.859 138.292 C 63.112 138.221,60.747 138.210,61.176 138.275 C 61.458 138.317,61.787 138.432,61.907 138.531 C 62.028 138.630,62.418 138.674,62.774 138.629 C 63.130 138.584,63.478 138.638,63.547 138.750 C 63.737 139.057,63.441 140.358,63.181 140.358 C 62.590 140.358,61.495 141.525,60.941 142.746 C 60.603 143.492,60.011 144.355,59.557 144.766 C 59.120 145.160,58.622 145.780,58.450 146.143 C 58.277 146.506,57.841 147.079,57.481 147.417 C 57.121 147.754,56.493 148.526,56.086 149.132 C 55.679 149.738,55.144 150.533,54.898 150.898 C 54.652 151.263,54.229 151.736,53.958 151.948 C 52.620 153.001,52.776 154.413,54.424 156.177 C 54.744 156.520,55.064 157.106,55.134 157.478 C 55.220 157.935,55.484 158.307,55.942 158.619 C 56.845 159.233,57.928 160.621,58.760 162.232 C 59.134 162.955,59.681 163.686,59.981 163.862 C 60.378 164.094,60.622 164.514,60.887 165.415 C 61.181 166.418,61.483 166.887,62.492 167.916 C 65.352 170.832,65.708 171.367,65.053 171.771 C 64.724 171.975,55.647 172.042,54.962 171.845 C 53.979 171.563,52.322 169.618,51.881 168.228 C 51.805 167.989,51.380 167.354,50.937 166.818 C 50.494 166.282,49.990 165.564,49.817 165.223 C 49.644 164.883,49.425 164.465,49.331 164.297 C 49.236 164.128,48.888 163.437,48.557 162.762 C 48.197 162.029,47.699 161.370,47.319 161.125 C 46.920 160.868,46.509 160.306,46.212 159.612 C 45.512 157.976,43.915 156.318,43.219 156.504 C 42.386 156.727,42.310 157.336,42.221 164.486 C 42.172 168.505,42.058 171.217,41.934 171.368 C 41.528 171.856,35.046 172.189,33.248 171.813 C 31.817 171.514,31.703 171.264,31.726 168.481 C 31.738 167.136,31.717 165.714,31.679 165.320 C 31.642 164.926,31.611 155.488,31.611 144.348 C 31.611 122.289,31.553 123.348,32.792 122.990 C 33.438 122.803,33.432 122.799,32.493 122.781 C 31.965 122.770,31.476 122.855,31.406 122.969 M34.186 122.842 C 34.233 122.886,35.967 122.975,38.040 123.040 C 41.961 123.162,42.106 123.199,42.173 124.092 C 42.190 124.317,42.183 129.657,42.158 135.959 C 42.101 150.509,42.319 152.448,43.951 151.930 C 44.348 151.804,45.667 150.037,45.972 149.223 C 46.049 149.017,46.532 148.434,47.046 147.926 C 48.203 146.782,49.514 144.931,49.514 144.441 C 49.514 144.240,49.583 144.044,49.668 144.007 C 49.752 143.969,50.281 143.386,50.844 142.711 C 51.406 142.036,51.940 141.451,52.030 141.412 C 52.121 141.372,52.421 140.981,52.698 140.542 C 52.975 140.103,53.331 139.744,53.489 139.744 C 53.647 139.744,53.958 139.496,54.179 139.192 C 54.535 138.703,54.697 138.647,55.607 138.695 C 56.172 138.725,56.691 138.656,56.761 138.543 C 56.836 138.422,57.644 138.360,58.717 138.393 C 59.722 138.424,60.504 138.382,60.453 138.300 C 60.402 138.218,58.961 138.177,57.251 138.209 L 54.141 138.267 53.106 139.368 C 52.537 139.973,50.895 142.078,49.457 144.045 C 48.019 146.012,46.571 147.944,46.239 148.338 C 45.908 148.731,45.286 149.560,44.857 150.179 C 44.209 151.114,43.975 151.304,43.471 151.304 C 42.590 151.304,42.582 151.168,42.584 136.471 C 42.585 129.325,42.523 123.317,42.447 123.120 C 42.322 122.796,41.925 122.762,38.205 122.762 C 35.948 122.762,34.139 122.798,34.186 122.842 M137.822 123.086 C 137.623 123.605,137.705 141.535,137.904 141.074 C 138.002 140.849,138.084 136.837,138.087 132.158 C 138.090 127.480,138.154 123.492,138.229 123.298 C 138.470 122.669,147.998 123.027,148.544 123.685 C 148.823 124.021,148.832 170.727,148.553 171.226 C 148.452 171.407,148.063 171.576,147.688 171.600 C 140.854 172.056,139.540 171.881,139.540 170.517 C 139.540 170.147,139.448 169.788,139.335 169.719 C 139.223 169.650,138.894 169.092,138.604 168.479 C 138.095 167.403,137.678 167.107,137.370 167.605 C 137.271 167.765,137.332 167.802,137.552 167.718 C 137.952 167.564,138.032 167.808,138.203 169.719 C 138.459 172.559,138.128 172.436,145.198 172.315 L 148.913 172.251 149.040 171.748 C 149.205 171.089,149.200 123.929,149.034 123.269 L 148.907 122.762 143.427 122.762 C 138.618 122.762,137.931 122.802,137.822 123.086 M181.611 123.402 C 181.436 124.279,181.489 171.025,181.666 171.662 L 181.809 172.174 186.726 172.229 C 192.559 172.294,192.215 172.440,192.390 169.821 L 192.507 168.082 192.195 169.412 C 192.024 170.143,191.845 170.941,191.799 171.184 C 191.726 171.570,191.552 171.637,190.435 171.709 C 187.817 171.878,183.226 171.767,182.813 171.524 C 182.588 171.391,182.247 171.235,182.055 171.176 C 181.707 171.069,181.482 125.407,181.822 124.041 C 181.904 123.711,182.090 123.579,182.477 123.574 C 182.775 123.570,183.197 123.432,183.415 123.267 C 183.951 122.862,191.753 122.822,192.070 123.223 C 192.446 123.697,192.531 125.494,192.546 133.299 C 192.559 139.801,192.612 141.158,192.867 141.586 L 193.171 142.097 193.059 141.586 C 192.997 141.304,192.946 136.954,192.944 131.918 L 192.941 122.762 187.340 122.762 L 181.739 122.762 181.611 123.402 M314.199 123.219 C 314.018 123.907,314.142 172.011,314.326 172.194 C 314.454 172.323,325.121 172.342,325.245 172.213 C 325.377 172.076,325.452 163.281,325.333 161.944 C 325.215 160.623,325.186 160.979,325.181 163.785 C 325.173 169.287,324.948 171.647,324.419 171.770 C 323.983 171.871,321.020 171.959,318.977 171.930 C 318.358 171.922,317.511 171.923,317.095 171.933 C 316.638 171.943,316.181 171.807,315.939 171.588 C 315.719 171.389,315.369 171.255,315.162 171.291 C 314.481 171.408,314.417 169.746,314.329 149.872 C 314.245 130.872,314.398 123.805,314.906 123.280 C 315.013 123.169,317.057 123.052,319.583 123.012 C 325.026 122.928,324.927 122.886,324.917 125.275 C 324.914 126.087,324.962 131.298,325.024 136.854 C 325.123 145.718,325.096 147.116,324.807 148.271 C 324.359 150.056,325.055 152.020,326.135 152.020 C 326.594 152.020,329.457 148.985,329.922 148.005 C 330.106 147.618,330.895 146.590,331.675 145.722 C 332.456 144.855,333.095 144.072,333.095 143.984 C 333.095 143.583,335.033 140.938,335.777 140.324 C 336.231 139.949,336.898 139.358,337.259 139.011 C 337.939 138.356,339.986 138.196,341.986 138.641 C 342.852 138.834,343.863 138.776,344.372 138.504 C 344.662 138.348,344.868 138.341,345.009 138.482 C 345.123 138.596,345.347 138.639,345.508 138.577 C 345.862 138.441,346.378 139.074,346.387 139.655 C 346.394 140.077,346.162 140.373,344.995 141.438 C 344.652 141.751,344.137 142.504,343.849 143.112 C 343.561 143.720,343.148 144.274,342.930 144.343 C 342.712 144.412,342.207 144.961,341.808 145.562 C 341.409 146.164,340.624 147.068,340.063 147.572 C 339.503 148.076,338.927 148.754,338.783 149.078 C 338.640 149.402,337.992 150.204,337.343 150.860 C 335.726 152.495,335.645 154.740,337.152 156.113 C 337.461 156.394,337.839 157.014,337.993 157.490 C 338.147 157.966,338.420 158.405,338.599 158.466 C 338.779 158.527,339.156 158.902,339.437 159.300 C 339.719 159.699,340.262 160.410,340.645 160.882 C 341.028 161.353,341.562 162.218,341.832 162.803 C 342.101 163.388,342.479 163.918,342.670 163.982 C 343.150 164.142,344.061 165.486,344.236 166.293 C 344.338 166.762,344.640 167.138,345.255 167.561 C 345.885 167.994,346.259 168.467,346.590 169.248 C 346.843 169.844,347.285 170.582,347.572 170.888 C 348.498 171.874,348.128 171.975,343.802 171.919 C 336.332 171.821,336.717 171.898,335.975 170.367 C 335.748 169.898,335.282 169.209,334.941 168.835 C 334.599 168.462,334.128 167.735,333.894 167.221 C 333.659 166.707,333.243 166.046,332.968 165.752 C 332.693 165.458,332.191 164.665,331.852 163.990 C 331.513 163.315,330.873 162.392,330.429 161.939 C 329.955 161.456,329.413 160.581,329.114 159.819 C 328.631 158.586,326.497 156.113,325.915 156.113 C 325.544 156.113,325.320 157.165,325.358 158.735 L 325.396 160.307 325.511 158.570 C 325.604 157.172,325.693 156.820,325.966 156.768 C 326.345 156.696,328.029 158.657,328.688 159.936 C 328.909 160.365,329.346 161.052,329.660 161.462 C 329.974 161.872,330.230 162.267,330.230 162.340 C 330.230 162.413,330.328 162.584,330.447 162.720 C 330.859 163.190,332.481 165.768,332.481 165.953 C 332.481 166.055,332.553 166.138,332.642 166.138 C 332.731 166.138,333.118 166.668,333.502 167.315 C 333.886 167.962,334.445 168.813,334.744 169.207 C 335.044 169.601,335.453 170.246,335.653 170.639 C 336.457 172.218,336.615 172.274,340.317 172.292 C 342.140 172.301,344.552 172.329,345.678 172.355 C 349.191 172.436,349.280 172.376,348.068 170.760 C 347.639 170.187,347.221 169.581,347.139 169.412 C 346.782 168.669,346.411 168.130,345.761 167.409 C 345.001 166.566,343.736 164.782,343.731 164.546 C 343.729 164.465,343.476 164.107,343.168 163.750 C 342.663 163.164,340.870 160.659,340.358 159.824 C 339.974 159.197,338.929 157.852,338.774 157.783 C 338.689 157.746,338.619 157.621,338.619 157.506 C 338.619 157.330,337.546 155.825,337.187 155.499 C 336.060 154.472,336.146 153.424,337.496 151.712 C 338.116 150.925,338.783 150.042,338.979 149.749 C 339.175 149.456,339.888 148.595,340.563 147.837 C 341.238 147.079,341.871 146.316,341.970 146.142 C 342.146 145.832,342.714 145.123,343.325 144.452 C 343.494 144.266,344.039 143.523,344.537 142.799 C 345.035 142.075,345.554 141.416,345.690 141.333 C 345.827 141.250,346.246 140.697,346.622 140.105 C 346.998 139.513,347.427 138.902,347.576 138.748 C 347.998 138.310,347.939 138.303,343.096 138.218 C 336.932 138.110,336.851 138.122,335.959 139.294 C 335.565 139.811,335.033 140.463,334.777 140.741 C 334.521 141.020,334.112 141.577,333.867 141.979 C 333.623 142.382,333.369 142.757,333.302 142.813 C 333.236 142.870,332.761 143.473,332.249 144.155 C 331.736 144.837,331.170 145.574,330.990 145.792 C 330.811 146.011,330.153 146.880,329.528 147.724 C 326.755 151.470,326.070 152.101,325.588 151.355 C 325.496 151.215,325.376 144.747,325.320 136.982 L 325.217 122.864 319.769 122.810 L 314.321 122.756 314.199 123.219 M165.159 123.284 C 165.218 123.343,166.360 123.411,167.696 123.435 L 170.126 123.478 170.402 124.297 C 170.847 125.614,170.573 128.520,169.872 129.921 C 169.181 131.301,168.734 131.437,165.422 131.272 C 164.184 131.211,162.582 131.135,161.861 131.105 C 160.182 131.033,160.038 130.716,160.016 127.047 C 159.995 123.665,159.953 123.719,162.694 123.560 L 164.808 123.438 162.353 123.458 L 159.898 123.478 159.795 126.343 C 159.590 132.094,159.262 131.777,165.350 131.712 C 171.010 131.652,170.561 131.917,170.822 128.475 C 171.100 124.795,170.950 123.424,170.254 123.305 C 169.488 123.174,165.031 123.155,165.159 123.284 M84.399 137.703 C 82.168 137.838,80.906 138.087,79.662 138.640 C 79.308 138.797,78.965 138.926,78.901 138.926 C 78.625 138.926,76.366 140.068,75.786 140.500 C 75.438 140.760,75.087 140.972,75.005 140.972 C 74.308 140.972,70.588 145.407,70.588 146.239 C 70.588 146.465,70.460 146.757,70.304 146.887 C 70.147 147.017,69.970 147.373,69.909 147.679 C 69.779 148.337,69.401 149.822,69.138 150.705 C 69.036 151.051,68.961 151.971,68.972 152.751 L 68.993 154.169 69.268 152.634 C 69.418 151.790,69.685 150.648,69.860 150.095 C 70.036 149.543,70.179 148.870,70.179 148.601 C 70.179 147.689,71.345 145.328,72.210 144.488 C 72.669 144.043,73.175 143.367,73.334 142.986 C 73.700 142.110,74.165 141.705,75.174 141.380 C 75.615 141.238,76.378 140.815,76.870 140.439 C 77.687 139.816,78.146 139.633,79.852 139.248 C 80.164 139.178,80.589 138.950,80.797 138.743 C 81.724 137.815,91.838 137.517,93.495 138.368 C 93.884 138.568,94.758 138.875,95.438 139.051 C 96.829 139.409,97.909 140.002,98.216 140.574 C 98.329 140.785,98.803 141.061,99.270 141.187 C 100.817 141.603,104.242 146.070,103.547 146.765 C 103.425 146.887,103.328 147.176,103.332 147.407 C 103.338 147.815,103.348 147.814,103.722 147.366 C 105.712 144.980,106.797 158.159,104.871 161.330 C 104.502 161.939,103.909 163.878,104.032 164.077 C 104.091 164.172,103.986 164.376,103.800 164.529 C 103.614 164.683,103.142 165.315,102.752 165.934 C 102.361 166.552,101.801 167.295,101.507 167.583 C 101.213 167.872,100.818 168.396,100.630 168.748 C 100.371 169.234,100.101 169.420,99.505 169.527 C 98.688 169.672,97.556 170.270,96.950 170.876 C 96.447 171.379,94.678 171.802,90.230 172.484 C 87.353 172.924,85.940 172.981,84.943 172.695 C 84.569 172.587,83.787 172.484,83.205 172.465 C 82.534 172.443,81.551 172.180,80.512 171.746 C 79.611 171.369,78.464 170.918,77.962 170.742 C 77.461 170.566,77.000 170.356,76.939 170.274 C 76.624 169.851,75.268 169.003,74.907 169.003 C 74.453 169.003,73.609 168.223,73.774 167.956 C 73.877 167.789,73.334 167.155,72.806 166.826 C 72.228 166.466,70.793 163.966,70.793 163.318 C 70.793 162.692,70.092 160.527,69.748 160.087 C 69.653 159.967,69.441 159.368,69.277 158.758 C 68.984 157.670,68.978 157.663,68.965 158.427 C 68.952 159.184,69.400 160.965,69.785 161.685 C 69.889 161.881,69.974 162.186,69.974 162.364 C 69.974 162.811,71.205 165.729,71.393 165.729 C 71.477 165.729,71.647 165.952,71.772 166.225 C 72.139 167.031,74.248 169.155,75.269 169.748 C 75.789 170.050,76.261 170.351,76.317 170.417 C 76.514 170.647,77.785 171.253,78.071 171.253 C 78.230 171.253,78.982 171.517,79.742 171.839 C 83.431 173.404,90.873 173.518,94.834 172.072 C 95.059 171.990,95.749 171.759,96.368 171.558 C 96.987 171.358,97.639 171.069,97.817 170.917 C 97.994 170.764,98.203 170.639,98.281 170.639 C 98.359 170.639,98.787 170.409,99.233 170.128 C 99.678 169.847,100.147 169.616,100.273 169.616 C 100.400 169.616,100.701 169.364,100.942 169.056 C 101.184 168.748,101.776 168.035,102.258 167.471 C 103.146 166.432,103.227 166.327,103.682 165.615 C 103.934 165.221,104.521 163.999,105.081 162.704 C 105.240 162.335,105.371 161.819,105.371 161.559 C 105.371 161.299,105.499 160.819,105.655 160.492 C 106.436 158.859,106.376 151.061,105.571 149.557 C 105.461 149.351,105.371 148.958,105.371 148.684 C 105.371 148.126,104.650 146.376,104.342 146.186 C 104.233 146.118,104.143 145.884,104.143 145.666 C 104.143 145.447,104.059 145.269,103.956 145.269 C 103.853 145.269,103.497 144.831,103.165 144.297 C 102.394 143.058,100.771 141.376,99.847 140.860 C 99.453 140.640,98.795 140.207,98.385 139.898 C 97.975 139.588,97.536 139.335,97.410 139.335 C 97.284 139.335,97.021 139.251,96.826 139.148 C 96.481 138.966,94.657 138.391,92.992 137.940 C 91.942 137.656,87.300 137.528,84.399 137.703 M203.171 137.713 C 203.171 137.863,205.583 138.130,206.343 138.066 C 207.390 137.976,208.841 138.406,209.697 139.059 C 210.191 139.436,210.928 139.836,211.334 139.949 C 212.770 140.347,214.760 142.657,215.736 145.058 C 216.027 145.775,216.396 146.507,216.554 146.684 C 216.713 146.862,216.902 147.514,216.973 148.133 C 217.044 148.752,217.259 149.995,217.451 150.895 C 218.022 153.570,217.913 158.222,217.233 160.239 C 216.942 161.102,216.639 162.461,216.560 163.260 C 216.437 164.507,216.305 164.864,215.628 165.783 C 215.195 166.372,214.648 167.269,214.414 167.775 C 213.858 168.980,213.087 169.768,212.299 169.939 C 211.949 170.015,211.340 170.330,210.946 170.638 C 210.552 170.946,210.000 171.268,209.719 171.352 C 209.437 171.437,209.059 171.636,208.877 171.795 C 207.366 173.119,201.426 173.030,198.798 171.644 C 198.334 171.399,197.525 170.981,197.000 170.715 C 196.475 170.449,195.755 169.864,195.400 169.416 C 194.753 168.600,193.325 167.431,193.657 167.990 C 194.038 168.631,196.133 170.666,196.756 171.001 C 198.213 171.783,199.633 172.440,200.406 172.689 C 201.532 173.051,207.555 173.090,207.908 172.737 C 208.049 172.596,208.456 172.481,208.814 172.481 C 209.171 172.481,209.579 172.343,209.719 172.174 C 209.859 172.005,210.089 171.867,210.230 171.867 C 210.371 171.867,210.602 171.729,210.742 171.560 C 210.882 171.391,211.146 171.253,211.329 171.252 C 211.844 171.250,213.874 169.343,214.757 168.032 C 215.193 167.384,215.596 166.808,215.652 166.752 C 215.902 166.503,216.661 164.726,216.875 163.887 C 217.005 163.381,217.190 162.691,217.286 162.353 C 217.382 162.015,217.522 161.325,217.598 160.818 C 217.673 160.312,217.865 159.503,218.023 159.021 C 218.366 157.980,218.406 153.228,218.084 151.816 C 217.969 151.309,217.803 150.343,217.716 149.667 C 217.557 148.436,217.261 147.335,216.782 146.189 C 216.101 144.560,215.419 143.223,215.045 142.785 C 214.818 142.519,214.349 141.936,214.003 141.489 C 213.343 140.637,211.670 139.335,211.234 139.335 C 211.095 139.335,210.950 139.266,210.912 139.182 C 210.802 138.934,208.993 138.107,208.561 138.107 C 208.342 138.107,208.076 138.025,207.969 137.925 C 207.734 137.705,203.171 137.503,203.171 137.713 M240.000 137.682 C 238.100 137.816,236.356 138.154,235.665 138.524 C 235.475 138.625,234.821 138.884,234.210 139.099 C 232.096 139.842,227.949 142.870,227.932 143.683 C 227.930 143.767,227.767 144.000,227.570 144.200 C 227.373 144.401,227.002 144.976,226.744 145.479 C 226.487 145.982,226.199 146.532,226.104 146.701 C 225.848 147.158,225.423 148.529,225.232 149.514 C 225.140 149.992,224.977 150.821,224.872 151.355 C 224.610 152.674,224.614 158.678,224.876 159.693 C 224.992 160.143,225.179 160.880,225.292 161.330 C 225.404 161.780,225.583 162.236,225.689 162.343 C 225.796 162.450,225.882 162.835,225.882 163.200 C 225.882 163.565,225.980 163.924,226.100 163.998 C 226.219 164.071,226.403 164.330,226.508 164.572 C 226.680 164.967,226.922 165.380,227.359 166.025 C 227.873 166.784,230.460 169.616,230.639 169.616 C 230.759 169.616,231.141 169.832,231.490 170.096 C 232.515 170.874,235.772 172.143,238.159 172.695 C 241.002 173.353,248.519 172.953,250.279 172.049 C 250.474 171.949,250.952 171.867,251.341 171.867 C 251.729 171.867,252.100 171.782,252.164 171.678 C 252.228 171.574,252.556 171.429,252.892 171.355 C 253.229 171.281,253.504 171.157,253.504 171.079 C 253.504 171.001,253.938 170.709,254.470 170.431 C 255.724 169.772,255.793 169.717,257.096 168.375 C 258.283 167.150,259.437 165.650,259.437 165.332 C 259.437 165.224,259.561 165.062,259.712 164.972 C 259.862 164.882,260.039 164.624,260.103 164.399 C 260.226 163.972,260.614 162.850,260.883 162.148 C 261.056 161.695,261.415 160.338,261.693 159.079 C 261.889 158.195,261.962 155.361,261.784 155.539 C 261.725 155.598,261.585 156.451,261.473 157.433 C 261.343 158.581,261.016 159.878,260.558 161.063 C 260.167 162.076,259.847 163.206,259.847 163.573 C 259.847 164.000,259.673 164.417,259.365 164.729 C 259.100 164.998,258.651 165.586,258.368 166.036 C 258.084 166.486,257.564 167.153,257.212 167.517 C 256.861 167.882,256.573 168.305,256.573 168.457 C 256.573 168.876,255.948 169.346,255.078 169.583 C 254.649 169.699,253.947 170.113,253.516 170.502 C 252.796 171.152,251.376 171.662,250.287 171.662 C 250.104 171.662,249.303 171.885,248.506 172.158 C 246.916 172.702,237.796 172.692,237.112 172.146 C 236.956 172.021,235.954 171.619,234.885 171.251 C 233.641 170.823,232.676 170.345,232.205 169.923 C 231.800 169.561,231.142 169.203,230.742 169.128 C 230.015 168.992,229.361 168.310,229.361 167.690 C 229.361 167.523,229.050 167.149,228.670 166.860 C 228.199 166.501,227.896 166.038,227.720 165.409 C 227.578 164.900,227.293 164.395,227.088 164.285 C 226.883 164.175,226.618 163.695,226.499 163.219 C 226.381 162.743,226.063 161.893,225.793 161.330 C 224.709 159.073,224.532 153.711,225.437 150.588 C 225.649 149.857,225.891 148.799,225.974 148.239 C 226.084 147.500,226.403 146.827,227.130 145.795 C 227.681 145.012,228.134 144.274,228.136 144.155 C 228.142 143.732,230.321 141.586,230.744 141.586 C 230.976 141.586,231.641 141.210,232.222 140.750 C 233.427 139.798,234.186 139.445,235.498 139.229 C 236.004 139.146,236.530 138.917,236.668 138.721 C 237.449 137.606,248.578 137.505,249.514 138.605 C 249.627 138.737,250.271 138.966,250.946 139.114 C 252.414 139.435,253.032 139.733,253.688 140.435 C 253.957 140.724,254.648 141.097,255.222 141.265 C 256.267 141.569,258.210 143.294,258.210 143.917 C 258.210 144.057,258.519 144.534,258.897 144.976 C 259.274 145.418,259.645 145.975,259.720 146.213 C 259.862 146.661,260.665 147.508,260.665 147.209 C 260.665 146.276,257.145 141.649,256.061 141.158 C 255.399 140.858,254.846 140.479,254.670 140.205 C 254.580 140.064,254.366 139.949,254.195 139.949 C 254.024 139.949,253.761 139.826,253.611 139.676 C 253.461 139.526,252.800 139.238,252.142 139.036 C 251.484 138.834,250.859 138.588,250.752 138.490 C 250.645 138.392,250.395 138.312,250.196 138.312 C 249.998 138.312,249.441 138.182,248.959 138.023 C 247.914 137.679,242.815 137.485,240.000 137.682 M284.092 137.623 C 283.192 137.662,281.995 137.828,281.432 137.993 C 280.870 138.158,279.862 138.449,279.194 138.640 C 277.425 139.147,274.307 140.764,273.797 141.439 C 273.646 141.640,273.156 142.143,272.709 142.556 C 272.012 143.202,270.077 146.053,270.077 146.436 C 270.077 146.508,269.953 146.712,269.802 146.889 C 269.651 147.067,269.367 147.949,269.171 148.849 C 268.975 149.749,268.673 151.100,268.501 151.851 C 268.152 153.371,268.215 158.374,268.597 159.488 C 269.140 161.072,269.463 162.239,269.463 162.620 C 269.463 162.988,269.785 163.770,270.322 164.706 C 270.419 164.875,270.552 165.174,270.618 165.371 C 270.684 165.568,270.822 165.729,270.924 165.729 C 271.026 165.729,271.189 165.938,271.286 166.193 C 271.628 167.092,274.273 169.580,275.703 170.348 C 276.182 170.605,277.374 171.225,277.940 171.512 C 280.491 172.805,290.223 173.620,291.967 172.687 C 292.179 172.573,292.530 172.481,292.748 172.481 C 293.659 172.481,297.484 170.986,298.312 170.306 C 298.482 170.167,298.886 169.916,299.212 169.747 C 300.134 169.268,302.287 167.064,302.725 166.149 C 302.942 165.696,303.183 165.323,303.259 165.322 C 303.510 165.318,304.481 163.086,304.862 161.637 C 307.572 151.335,303.817 141.705,296.061 139.069 C 295.555 138.897,294.864 138.610,294.527 138.433 C 294.189 138.255,293.654 138.109,293.337 138.109 C 293.020 138.108,292.606 138.025,292.416 137.925 C 292.023 137.717,286.547 137.519,284.092 137.623 M122.674 137.880 C 122.613 137.979,122.216 138.126,121.793 138.205 C 121.370 138.285,120.978 138.420,120.921 138.507 C 120.865 138.593,120.169 138.998,119.375 139.408 C 118.581 139.817,117.641 140.436,117.285 140.784 C 115.891 142.146,113.739 146.022,113.489 147.621 C 113.436 147.959,113.238 149.018,113.049 149.974 C 112.296 153.776,112.115 157.601,112.625 158.922 C 112.946 159.753,113.289 161.306,113.528 163.011 C 113.610 163.598,113.746 164.147,113.830 164.231 C 113.914 164.315,113.936 164.019,113.879 163.573 C 113.822 163.127,113.720 162.256,113.652 161.637 C 113.584 161.018,113.357 159.986,113.147 159.343 C 112.406 157.082,112.503 152.919,113.347 150.699 C 113.461 150.399,113.613 149.492,113.685 148.683 C 113.757 147.874,113.896 147.109,113.995 146.983 C 114.094 146.856,114.620 145.843,115.164 144.731 C 116.432 142.138,117.793 140.608,119.300 140.080 C 119.898 139.870,120.750 139.456,121.194 139.159 C 122.676 138.168,122.850 138.114,124.604 138.090 C 128.011 138.045,128.867 137.759,125.690 137.727 C 124.093 137.711,122.736 137.780,122.674 137.880 M129.719 138.125 C 130.338 138.352,131.166 138.642,131.560 138.770 C 132.460 139.062,134.239 140.211,135.211 141.127 C 135.899 141.776,136.506 142.199,136.749 142.199 C 136.965 142.199,134.481 140.005,133.708 139.512 C 132.165 138.529,130.102 137.696,129.233 137.705 C 128.671 137.711,128.729 137.761,129.719 138.125 M198.670 138.528 C 197.826 138.956,197.228 139.312,197.340 139.319 C 197.806 139.350,199.208 138.861,199.558 138.547 C 199.764 138.362,200.317 138.104,200.785 137.974 L 201.637 137.738 200.921 137.745 C 200.507 137.748,199.556 138.079,198.670 138.528 M291.765 138.144 C 292.384 138.260,293.150 138.343,293.467 138.329 C 293.785 138.315,293.993 138.387,293.930 138.489 C 293.745 138.789,294.246 139.067,295.420 139.314 C 296.024 139.441,296.760 139.716,297.057 139.925 C 297.353 140.134,298.010 140.509,298.517 140.759 C 299.023 141.009,299.819 141.596,300.285 142.064 C 300.751 142.533,301.397 143.154,301.721 143.444 C 302.065 143.754,302.329 144.216,302.358 144.560 C 302.407 145.156,303.341 146.701,303.652 146.701 C 304.163 146.701,304.815 149.543,305.305 153.897 C 305.592 156.447,305.407 158.326,304.604 161.023 C 304.319 161.980,304.026 163.024,303.953 163.344 C 303.879 163.664,303.501 164.253,303.112 164.654 C 302.665 165.114,302.404 165.583,302.404 165.926 C 302.404 166.580,301.727 167.366,301.162 167.366 C 300.938 167.366,300.698 167.527,300.628 167.724 C 300.422 168.310,299.538 169.412,299.273 169.412 C 299.139 169.412,298.435 169.777,297.711 170.222 C 293.046 173.091,282.427 173.638,278.551 171.208 C 278.110 170.932,277.289 170.534,276.726 170.324 C 276.164 170.114,275.583 169.776,275.436 169.574 C 275.289 169.372,275.055 169.207,274.916 169.207 C 274.362 169.207,270.332 164.524,270.163 163.683 C 270.106 163.402,269.872 162.481,269.643 161.637 C 268.670 158.064,268.454 156.951,268.447 155.499 C 268.440 154.016,268.888 151.282,269.247 150.609 C 269.343 150.429,269.488 149.729,269.570 149.054 C 269.712 147.879,269.965 147.125,270.289 146.905 C 270.372 146.849,270.786 146.159,271.208 145.371 C 271.925 144.034,275.115 140.563,275.627 140.563 C 275.728 140.563,275.971 140.474,276.166 140.365 C 277.392 139.682,279.336 138.952,280.256 138.828 C 280.846 138.748,281.375 138.609,281.431 138.519 C 281.830 137.873,288.936 137.615,291.765 138.144 M361.944 137.881 C 361.775 137.980,361.246 138.126,360.768 138.204 C 360.291 138.283,359.848 138.432,359.784 138.534 C 359.721 138.637,359.514 138.721,359.325 138.721 C 357.968 138.721,355.176 140.767,353.462 143.018 C 351.955 144.998,351.384 149.777,352.412 151.816 C 352.610 152.210,352.878 152.739,353.008 152.992 C 353.137 153.246,353.336 153.458,353.450 153.465 C 353.564 153.472,353.937 153.863,354.280 154.335 C 354.701 154.915,355.312 155.393,356.170 155.814 C 356.868 156.156,357.550 156.547,357.686 156.684 C 357.822 156.820,358.128 156.931,358.365 156.931 C 358.602 156.931,358.975 157.066,359.194 157.231 C 359.412 157.397,359.741 157.535,359.925 157.538 C 360.110 157.542,360.524 157.682,360.846 157.850 C 361.169 158.019,361.588 158.157,361.778 158.157 C 361.968 158.158,362.181 158.251,362.251 158.363 C 362.320 158.476,362.533 158.568,362.723 158.569 C 362.913 158.570,363.333 158.708,363.655 158.876 C 363.977 159.044,364.374 159.182,364.536 159.182 C 365.371 159.182,368.740 161.159,369.122 161.873 C 370.709 164.839,366.569 167.435,361.319 166.766 C 357.853 166.324,357.113 166.174,355.908 165.673 C 352.604 164.298,352.432 164.340,352.258 166.580 C 351.927 170.833,352.144 171.728,353.555 171.924 C 354.829 172.101,356.714 172.527,357.183 172.744 C 358.032 173.136,367.955 173.035,369.616 172.617 C 373.603 171.613,376.268 170.090,377.899 167.882 C 378.351 167.270,378.721 166.646,378.721 166.495 C 378.721 166.344,378.820 166.122,378.940 166.001 C 379.180 165.761,379.517 164.027,379.677 162.205 C 379.753 161.344,379.670 160.722,379.364 159.852 C 378.774 158.172,377.536 155.912,377.205 155.909 C 377.103 155.909,376.550 155.563,375.977 155.141 C 374.948 154.383,374.286 154.025,372.685 153.363 C 372.235 153.176,371.707 152.936,371.512 152.829 C 371.316 152.722,371.008 152.634,370.827 152.634 C 370.646 152.634,370.254 152.510,369.955 152.358 C 368.861 151.803,367.967 151.437,367.468 151.342 C 366.709 151.196,365.562 150.726,365.254 150.435 C 365.105 150.294,364.852 150.179,364.691 150.179 C 364.531 150.179,364.398 150.110,364.398 150.026 C 364.397 149.941,364.121 149.715,363.784 149.524 C 363.447 149.332,363.171 149.033,363.171 148.859 C 363.171 148.685,363.090 148.542,362.992 148.542 C 362.646 148.542,362.312 147.354,362.463 146.663 C 362.747 145.363,363.592 144.603,365.252 144.157 C 365.892 143.984,366.132 143.859,365.831 143.853 C 363.952 143.815,361.394 145.784,361.637 147.082 C 361.857 148.253,362.274 148.867,363.528 149.862 C 364.176 150.376,364.825 150.895,364.971 151.016 C 365.306 151.294,366.398 151.611,367.019 151.611 C 367.280 151.611,368.155 151.930,368.964 152.319 C 369.773 152.708,370.935 153.220,371.546 153.456 C 373.235 154.108,375.190 155.086,375.462 155.414 C 375.597 155.576,376.092 155.879,376.564 156.087 C 377.196 156.367,377.487 156.649,377.672 157.159 C 377.810 157.540,378.184 158.358,378.502 158.977 C 379.313 160.551,379.393 161.131,379.035 162.833 C 378.862 163.653,378.721 164.602,378.721 164.942 C 378.721 166.034,376.624 169.412,375.946 169.412 C 375.812 169.412,375.588 169.549,375.448 169.718 C 375.309 169.886,374.814 170.136,374.349 170.274 C 373.884 170.412,373.118 170.783,372.647 171.100 C 370.251 172.707,360.351 173.395,357.703 172.138 C 357.334 171.963,356.833 171.872,356.589 171.935 C 356.055 172.075,354.092 171.640,353.219 171.189 C 352.349 170.739,352.009 168.804,352.557 167.430 C 352.684 167.113,352.799 166.532,352.813 166.138 C 352.848 165.163,354.423 164.975,355.640 165.801 C 356.758 166.560,356.987 166.617,360.307 166.961 C 362.852 167.225,362.596 167.220,364.706 167.056 C 371.657 166.517,371.867 160.885,365.013 158.816 C 364.619 158.697,363.744 158.443,363.069 158.252 C 362.394 158.061,361.404 157.684,360.868 157.414 C 360.333 157.144,359.478 156.866,358.968 156.796 C 358.322 156.707,357.919 156.514,357.641 156.160 C 357.396 155.849,357.032 155.652,356.702 155.652 C 356.119 155.652,355.571 155.194,354.807 154.068 C 354.540 153.673,353.981 153.058,353.566 152.701 C 352.020 151.372,351.876 146.272,353.317 143.939 C 354.007 142.821,356.823 139.949,357.228 139.949 C 357.408 139.949,357.766 139.801,358.024 139.621 C 358.281 139.441,359.101 139.166,359.846 139.010 C 360.590 138.855,361.259 138.632,361.330 138.516 C 361.778 137.792,370.425 137.771,373.708 138.486 C 376.754 139.149,376.774 139.172,376.793 142.060 C 376.813 145.011,377.180 144.821,373.197 143.913 C 371.360 143.494,367.574 143.309,366.854 143.602 C 366.459 143.763,366.855 143.814,368.593 143.827 C 371.548 143.848,375.726 144.623,376.612 145.313 C 376.918 145.552,377.037 144.852,377.149 142.148 C 377.285 138.874,377.207 138.774,374.015 138.144 C 372.258 137.798,362.448 137.583,361.944 137.881 M160.000 138.302 C 159.478 138.641,159.471 171.216,159.993 172.060 C 160.282 172.528,170.430 172.439,170.694 171.966 C 170.921 171.562,170.962 138.566,170.736 138.340 C 170.516 138.120,160.336 138.084,160.000 138.302 M170.357 139.488 C 170.702 141.043,170.717 170.047,170.374 171.049 L 170.128 171.765 168.184 171.920 C 165.759 172.114,160.740 171.902,160.313 171.589 C 159.510 170.999,159.712 139.235,160.522 138.630 C 160.847 138.387,161.767 138.340,165.520 138.373 L 170.119 138.414 170.357 139.488 M195.356 140.818 C 194.404 141.850,194.082 142.323,194.299 142.371 C 194.594 142.437,195.806 141.287,195.806 140.942 C 195.806 140.854,196.091 140.456,196.441 140.058 C 197.638 138.695,196.726 139.334,195.356 140.818 M211.189 143.771 C 211.224 144.071,211.368 144.354,211.509 144.400 C 211.891 144.526,211.828 143.495,211.444 143.348 C 211.195 143.252,211.138 143.346,211.189 143.771 M86.547 143.758 C 85.349 143.969,85.115 144.073,84.298 144.756 C 83.826 145.150,83.326 145.473,83.188 145.473 C 82.639 145.473,82.016 146.496,81.618 148.052 C 81.390 148.940,81.071 150.115,80.909 150.663 C 79.744 154.592,81.371 165.284,83.139 165.317 C 83.234 165.318,83.539 165.499,83.818 165.718 C 85.324 166.902,88.707 166.914,91.085 165.743 C 92.206 165.191,92.239 165.153,92.897 163.683 C 93.124 163.176,93.515 162.503,93.765 162.185 C 94.566 161.170,94.633 150.289,93.844 149.386 C 93.685 149.203,93.441 148.685,93.303 148.235 C 92.477 145.542,90.673 144.008,88.039 143.760 C 87.500 143.710,86.829 143.709,86.547 143.758 M242.046 143.868 C 241.427 143.966,240.691 144.229,240.409 144.452 C 240.128 144.675,239.560 145.063,239.147 145.314 C 238.259 145.853,237.771 146.601,237.305 148.133 C 237.117 148.752,236.777 149.750,236.549 150.352 C 235.591 152.875,236.147 160.978,237.391 162.644 C 237.595 162.916,237.864 163.548,237.990 164.048 C 238.169 164.758,238.358 165.021,238.854 165.249 C 239.203 165.410,239.784 165.728,240.146 165.956 C 242.205 167.256,247.086 166.421,248.054 164.604 C 248.174 164.379,248.540 163.795,248.867 163.307 C 250.110 161.454,250.791 153.513,249.957 150.588 C 248.993 147.209,248.125 145.697,246.571 144.690 C 245.737 144.150,245.281 144.007,243.581 143.751 C 243.355 143.717,242.665 143.770,242.046 143.868 M285.190 143.764 C 284.894 143.816,284.402 144.138,284.098 144.479 C 283.795 144.820,283.247 145.224,282.882 145.377 C 282.073 145.715,281.890 145.943,281.538 147.060 C 281.208 148.107,281.369 148.422,281.749 147.475 C 282.484 145.643,284.802 144.164,286.937 144.164 C 290.155 144.164,291.583 145.477,293.141 149.872 C 293.610 151.194,293.675 158.913,293.230 160.409 C 291.916 164.831,290.543 166.126,287.000 166.289 C 284.011 166.427,282.500 165.172,281.028 161.330 C 280.108 158.928,280.068 152.612,280.957 150.077 C 281.075 149.739,281.219 149.187,281.277 148.849 L 281.382 148.235 280.979 148.747 C 280.334 149.566,279.866 153.269,279.905 157.238 C 279.934 160.070,281.748 164.953,283.021 165.625 C 283.385 165.817,283.989 166.141,284.363 166.345 C 286.541 167.530,291.745 166.370,292.027 164.637 C 292.087 164.265,292.474 163.259,292.887 162.401 C 294.078 159.924,294.286 151.267,293.212 148.849 C 291.702 145.451,290.951 144.449,289.614 144.046 C 288.732 143.781,286.064 143.611,285.190 143.764 M90.024 144.721 C 90.530 144.966,91.128 145.367,91.354 145.612 C 92.305 146.644,92.796 147.351,92.928 147.879 C 93.005 148.187,93.304 149.127,93.593 149.967 C 94.538 152.719,94.223 161.000,93.131 162.092 C 92.998 162.224,92.887 162.475,92.884 162.650 C 92.838 164.983,87.912 167.258,85.505 166.057 C 85.143 165.877,84.747 165.725,84.623 165.720 C 84.195 165.704,82.899 164.382,82.418 163.472 C 80.462 159.769,80.247 153.006,81.935 148.289 C 83.219 144.701,86.757 143.140,90.024 144.721 M129.383 144.419 C 128.609 144.647,127.790 145.078,127.249 145.540 C 126.766 145.954,126.311 146.292,126.236 146.292 C 126.029 146.292,125.627 147.279,125.627 147.788 C 125.627 148.037,125.447 148.577,125.226 148.988 C 124.149 150.998,123.916 159.963,124.887 162.046 C 125.822 164.052,126.455 164.849,127.316 165.104 C 127.794 165.246,128.301 165.458,128.445 165.575 C 128.588 165.692,128.753 165.740,128.810 165.683 C 128.868 165.625,128.599 165.428,128.213 165.245 C 126.961 164.651,126.246 163.642,125.093 160.845 C 124.610 159.674,124.608 151.574,125.090 150.384 C 125.249 149.990,125.530 149.167,125.713 148.555 C 126.666 145.366,130.133 143.692,133.318 144.884 C 135.346 145.643,136.237 146.724,137.279 149.688 C 137.830 151.256,137.916 159.885,137.390 160.893 C 137.222 161.215,137.084 161.595,137.084 161.737 C 137.084 161.880,136.946 162.111,136.777 162.251 C 136.609 162.391,136.471 162.634,136.471 162.791 C 136.471 164.657,132.327 166.848,130.278 166.065 C 129.158 165.637,129.044 165.643,129.297 166.115 C 129.954 167.343,135.737 165.935,136.170 164.442 C 136.242 164.193,136.610 163.529,136.988 162.967 C 138.277 161.045,138.575 151.264,137.416 148.940 C 137.234 148.574,137.084 148.180,137.084 148.065 C 137.084 147.445,135.373 145.276,134.712 145.058 C 134.327 144.930,133.860 144.675,133.675 144.490 C 133.180 143.995,130.947 143.958,129.383 144.419 M197.930 144.300 C 197.691 144.439,197.185 144.727,196.804 144.940 C 194.674 146.134,193.810 146.880,193.665 147.651 C 193.586 148.071,193.295 149.119,193.017 149.981 C 192.516 151.533,192.378 156.820,192.793 158.568 C 192.860 158.849,193.024 159.895,193.157 160.893 C 193.339 162.253,193.501 162.790,193.805 163.041 C 194.029 163.225,194.437 163.728,194.714 164.159 C 195.002 164.607,195.526 165.071,195.940 165.244 C 196.339 165.410,196.894 165.795,197.175 166.098 C 197.895 166.875,201.114 166.946,201.640 166.195 C 201.815 165.945,202.329 165.630,202.782 165.494 C 203.244 165.356,203.830 164.972,204.118 164.619 C 204.401 164.273,204.759 163.833,204.914 163.641 C 205.494 162.926,205.788 162.111,205.930 160.818 C 206.010 160.087,206.240 158.885,206.441 158.148 C 206.981 156.163,206.687 151.937,205.829 149.354 C 205.493 148.341,205.217 147.397,205.217 147.255 C 205.217 146.650,202.351 144.329,201.844 144.523 C 201.694 144.581,201.080 144.497,200.479 144.337 C 199.139 143.980,198.494 143.971,197.930 144.300 M245.438 144.570 C 246.772 145.043,248.798 147.276,248.798 148.273 C 248.798 148.542,248.923 148.965,249.076 149.214 C 250.277 151.168,250.264 158.782,249.055 161.739 C 246.788 167.281,240.390 168.116,238.084 163.171 C 237.874 162.721,237.574 162.109,237.419 161.810 C 237.263 161.511,237.136 161.000,237.136 160.674 C 237.136 160.348,237.023 159.969,236.885 159.831 C 236.086 159.033,236.690 149.173,237.571 148.628 C 237.669 148.568,237.749 148.353,237.749 148.152 C 237.749 146.991,238.750 145.858,240.818 144.677 C 241.896 144.061,243.873 144.016,245.438 144.570 M200.928 144.715 C 202.875 145.232,204.486 146.722,205.064 148.541 C 205.261 149.160,205.505 149.852,205.605 150.077 C 206.098 151.183,206.444 156.783,206.062 157.495 C 205.935 157.733,205.831 158.463,205.830 159.117 C 205.829 159.772,205.691 160.570,205.523 160.893 C 205.355 161.215,205.217 161.689,205.217 161.947 C 205.217 163.559,201.597 166.343,199.500 166.343 C 197.247 166.343,194.153 163.789,193.548 161.429 C 192.922 158.990,192.739 150.707,193.299 150.148 C 193.440 150.008,193.555 149.652,193.555 149.359 C 193.555 149.065,193.690 148.646,193.855 148.428 C 194.021 148.209,194.159 147.881,194.162 147.698 C 194.196 145.978,198.514 144.073,200.928 144.715 M260.668 147.916 C 260.665 148.463,260.999 150.424,261.315 151.714 C 261.875 153.995,261.879 154.002,261.787 152.506 C 261.737 151.703,261.614 150.829,261.513 150.562 C 261.412 150.295,261.266 149.612,261.188 149.044 C 261.027 147.861,260.673 147.095,260.668 147.916 M68.816 155.703 C 68.816 156.547,68.852 156.893,68.896 156.471 C 68.940 156.049,68.940 155.358,68.896 154.936 C 68.852 154.514,68.816 154.859,68.816 155.703 M114.069 164.926 C 114.154 165.199,114.292 165.468,114.375 165.524 C 114.458 165.581,114.729 166.076,114.979 166.626 C 115.501 167.779,115.507 167.787,117.136 169.442 C 118.834 171.168,119.404 171.557,120.818 171.952 C 121.494 172.141,122.322 172.395,122.660 172.515 C 124.239 173.079,129.921 173.186,130.247 172.659 C 130.307 172.561,130.622 172.481,130.946 172.481 C 131.271 172.481,131.588 172.397,131.651 172.294 C 131.770 172.103,133.418 171.253,133.671 171.253 C 133.748 171.253,133.979 171.092,134.186 170.895 C 134.392 170.698,135.129 169.999,135.823 169.342 C 136.517 168.685,137.083 168.040,137.081 167.910 C 137.079 167.742,137.034 167.738,136.928 167.897 C 136.845 168.020,136.537 168.180,136.243 168.252 C 135.945 168.325,135.494 168.711,135.220 169.128 C 134.522 170.192,131.287 172.277,130.338 172.274 C 129.941 172.272,128.972 172.422,128.184 172.606 C 126.856 172.916,126.640 172.916,125.217 172.603 C 124.373 172.417,122.946 172.120,122.046 171.943 C 119.738 171.489,119.496 171.364,118.484 170.103 C 117.988 169.485,117.327 168.848,117.015 168.686 C 116.662 168.504,116.202 167.909,115.798 167.114 C 115.059 165.659,113.801 164.067,114.069 164.926 " stroke="none" fill="#5fad5e" fill-rule="evenodd"></path>
                    <path id="path4" d="M198.670 19.233 L 197.136 19.364 198.836 19.400 C 199.926 19.424,200.490 19.364,200.409 19.233 C 200.340 19.120,200.265 19.045,200.244 19.065 C 200.222 19.085,199.514 19.161,198.670 19.233 M194.735 19.586 C 195.103 19.631,195.655 19.630,195.963 19.584 C 196.270 19.537,195.969 19.500,195.294 19.501 C 194.619 19.502,194.367 19.540,194.735 19.586 M202.919 19.586 C 203.287 19.631,203.839 19.630,204.147 19.584 C 204.454 19.537,204.153 19.500,203.478 19.501 C 202.803 19.502,202.552 19.540,202.919 19.586 M189.349 20.369 C 188.958 20.682,188.958 20.685,189.361 20.499 C 189.586 20.396,189.908 20.260,190.077 20.197 C 190.342 20.099,190.340 20.081,190.065 20.067 C 189.889 20.058,189.567 20.194,189.349 20.369 M227.528 29.429 C 228.029 29.895,228.502 30.277,228.579 30.279 C 228.655 30.280,228.840 30.396,228.989 30.537 C 229.138 30.678,229.444 30.920,229.668 31.075 C 230.075 31.357,229.343 30.680,227.869 29.413 C 226.727 28.432,226.467 28.444,227.528 29.429 M170.729 29.923 L 170.128 30.588 170.793 29.987 C 171.159 29.657,171.458 29.358,171.458 29.322 C 171.458 29.164,171.289 29.303,170.729 29.923 M231.837 33.237 C 232.242 33.693,232.726 34.294,232.911 34.572 C 233.096 34.851,233.248 34.970,233.248 34.838 C 233.248 34.705,232.765 34.104,232.174 33.502 C 231.583 32.900,231.431 32.780,231.837 33.237 M238.697 42.959 C 238.865 43.296,239.083 43.622,239.181 43.682 C 239.278 43.743,239.221 43.516,239.052 43.179 C 238.884 42.842,238.667 42.516,238.569 42.456 C 238.471 42.395,238.529 42.622,238.697 42.959 M173.043 44.543 C 173.297 44.592,173.711 44.592,173.964 44.543 C 174.217 44.495,174.010 44.455,173.504 44.455 C 172.997 44.455,172.790 44.495,173.043 44.543 M176.931 44.547 C 177.297 44.592,177.895 44.592,178.261 44.547 C 178.627 44.502,178.327 44.464,177.596 44.464 C 176.864 44.464,176.565 44.502,176.931 44.547 M204.655 44.546 C 204.964 44.592,205.471 44.592,205.780 44.546 C 206.090 44.499,205.836 44.460,205.217 44.460 C 204.598 44.460,204.345 44.499,204.655 44.546 M200.359 48.593 C 200.361 49.043,200.403 49.204,200.452 48.949 C 200.501 48.695,200.499 48.326,200.447 48.131 C 200.396 47.935,200.356 48.143,200.359 48.593 M241.645 50.053 C 241.640 50.181,241.771 50.595,241.936 50.974 C 242.100 51.353,242.238 51.558,242.243 51.430 C 242.247 51.302,242.116 50.888,241.952 50.509 C 241.787 50.131,241.649 49.925,241.645 50.053 M220.123 53.658 C 220.227 53.761,220.529 53.811,220.795 53.769 C 221.204 53.705,221.176 53.676,220.607 53.582 C 220.201 53.514,220.010 53.544,220.123 53.658 M210.363 55.487 C 210.324 56.445,210.562 56.592,211.119 55.952 C 211.360 55.675,211.650 55.448,211.763 55.448 C 211.877 55.448,211.969 55.357,211.969 55.246 C 211.969 55.136,211.653 55.223,211.266 55.441 L 210.562 55.836 210.478 55.284 C 210.411 54.845,210.388 54.886,210.363 55.487 M155.601 57.903 C 155.522 58.368,155.501 58.792,155.553 58.844 C 155.606 58.897,155.710 58.556,155.785 58.087 C 155.860 57.618,155.882 57.194,155.833 57.146 C 155.784 57.097,155.680 57.438,155.601 57.903 M183.516 59.386 C 183.023 59.977,182.782 60.331,182.980 60.173 C 183.378 59.856,184.638 58.312,184.499 58.312 C 184.451 58.312,184.009 58.795,183.516 59.386 M181.721 60.806 C 181.678 61.798,181.921 61.913,182.361 61.109 L 182.717 60.460 182.318 60.927 L 181.919 61.393 181.836 60.722 L 181.753 60.051 181.721 60.806 M243.754 62.609 C 243.754 63.565,243.790 63.957,243.833 63.478 C 243.876 63.000,243.876 62.217,243.833 61.739 C 243.790 61.261,243.754 61.652,243.754 62.609 M228.750 62.319 C 228.752 62.535,228.847 62.849,228.961 63.018 C 229.112 63.242,229.131 63.159,229.031 62.711 C 228.863 61.959,228.746 61.795,228.750 62.319 M190.527 64.286 C 190.190 64.623,190.219 65.516,190.582 65.997 C 190.747 66.215,190.885 66.284,190.889 66.150 C 190.892 66.016,190.803 65.850,190.691 65.780 C 190.406 65.604,190.434 64.584,190.731 64.286 C 190.866 64.151,190.931 64.041,190.875 64.041 C 190.818 64.041,190.662 64.151,190.527 64.286 M219.689 66.963 C 219.815 68.495,219.914 68.622,219.933 67.276 C 219.942 66.635,219.871 66.063,219.775 66.004 C 219.679 65.945,219.641 66.376,219.689 66.963 M210.054 66.539 C 209.985 66.797,209.938 67.284,209.950 67.621 C 209.965 68.045,210.024 67.920,210.141 67.219 C 210.320 66.150,210.268 65.742,210.054 66.539 M229.412 67.008 C 229.414 67.458,229.456 67.618,229.505 67.363 C 229.554 67.109,229.552 66.741,229.501 66.545 C 229.450 66.349,229.410 66.558,229.412 67.008 M243.171 70.179 C 243.093 70.644,243.071 71.068,243.124 71.120 C 243.176 71.173,243.281 70.832,243.355 70.363 C 243.430 69.894,243.452 69.471,243.403 69.422 C 243.354 69.373,243.250 69.714,243.171 70.179 M228.993 72.248 C 228.848 72.713,228.770 73.135,228.820 73.185 C 228.945 73.310,229.410 71.861,229.325 71.607 C 229.288 71.495,229.138 71.783,228.993 72.248 M217.817 72.180 L 217.424 72.737 217.970 72.241 C 218.544 71.719,218.615 71.607,218.363 71.618 C 218.279 71.621,218.033 71.874,217.817 72.180 M212.819 72.950 C 213.005 73.140,213.268 73.258,213.405 73.213 C 213.541 73.167,213.389 73.012,213.067 72.868 C 212.518 72.622,212.502 72.627,212.819 72.950 M183.223 72.995 C 183.110 73.078,182.834 73.371,182.609 73.646 L 182.199 74.145 182.920 73.731 L 183.641 73.317 183.990 73.743 C 184.321 74.148,184.323 74.137,184.021 73.504 C 183.694 72.817,183.571 72.739,183.223 72.995 M156.536 74.208 C 156.528 74.454,156.614 74.713,156.726 74.783 C 156.968 74.932,156.968 74.732,156.726 74.169 C 156.557 73.774,156.550 73.776,156.536 74.208 M227.740 75.468 C 227.406 76.092,227.475 76.266,227.847 75.736 C 228.027 75.478,228.127 75.220,228.068 75.161 C 228.010 75.102,227.862 75.240,227.740 75.468 M200.363 77.136 C 200.363 77.642,200.403 77.849,200.451 77.596 C 200.500 77.343,200.500 76.928,200.451 76.675 C 200.403 76.422,200.363 76.629,200.363 77.136 M171.728 78.977 C 171.728 79.708,171.765 80.008,171.810 79.642 C 171.856 79.276,171.856 78.678,171.810 78.312 C 171.765 77.946,171.728 78.246,171.728 78.977 M158.165 79.182 C 158.165 79.534,158.507 80.138,158.625 79.994 C 158.668 79.941,158.582 79.668,158.434 79.386 C 158.286 79.104,158.165 79.012,158.165 79.182 M210.416 79.462 C 210.352 79.629,210.341 79.979,210.391 80.241 C 210.469 80.650,210.485 80.635,210.509 80.130 C 210.537 79.553,210.545 79.549,211.049 79.879 C 211.711 80.313,211.704 80.012,211.040 79.528 C 210.606 79.213,210.516 79.203,210.416 79.462 M158.789 80.538 C 158.780 80.777,158.926 81.099,159.113 81.254 C 159.417 81.505,159.431 81.491,159.243 81.125 C 159.127 80.900,158.981 80.578,158.918 80.409 C 158.840 80.198,158.800 80.239,158.789 80.538 M220.153 81.739 C 219.872 81.900,219.734 82.032,219.847 82.032 C 219.959 82.032,220.281 81.900,220.563 81.739 C 220.844 81.578,220.982 81.447,220.870 81.447 C 220.757 81.447,220.435 81.578,220.153 81.739 M163.804 89.514 C 163.988 89.795,164.220 90.026,164.319 90.026 C 164.418 90.026,164.298 89.795,164.054 89.514 C 163.809 89.233,163.578 89.003,163.539 89.003 C 163.500 89.003,163.620 89.233,163.804 89.514 M231.397 93.885 C 231.110 94.182,230.798 94.563,230.704 94.731 C 230.609 94.900,230.880 94.691,231.305 94.266 C 231.730 93.841,232.042 93.460,231.998 93.419 C 231.954 93.379,231.683 93.589,231.397 93.885 M206.854 106.803 C 206.581 106.979,206.581 107.001,206.854 107.001 C 207.023 107.001,207.299 106.912,207.468 106.803 C 207.741 106.627,207.741 106.605,207.468 106.605 C 207.299 106.605,207.023 106.694,206.854 106.803 M197.494 107.558 C 197.691 107.609,198.013 107.609,198.210 107.558 C 198.407 107.506,198.246 107.464,197.852 107.464 C 197.458 107.464,197.297 107.506,197.494 107.558 M142.660 122.704 C 142.969 122.751,143.476 122.751,143.785 122.704 C 144.095 122.657,143.841 122.619,143.223 122.619 C 142.604 122.619,142.350 122.657,142.660 122.704 M187.877 122.708 C 188.412 122.750,189.286 122.750,189.821 122.708 C 190.355 122.666,189.918 122.631,188.849 122.631 C 187.780 122.631,187.343 122.666,187.877 122.708 M31.130 124.450 C 31.162 126.193,31.248 125.991,31.349 123.938 C 31.381 123.291,31.338 122.762,31.253 122.762 C 31.169 122.762,31.114 123.522,31.130 124.450 M42.511 124.261 C 42.610 126.405,42.711 126.586,42.738 124.667 C 42.751 123.745,42.690 122.947,42.603 122.892 C 42.515 122.838,42.474 123.454,42.511 124.261 M149.068 123.509 C 149.257 124.554,149.361 124.632,149.361 123.729 C 149.361 123.323,149.263 122.930,149.143 122.856 C 148.995 122.765,148.971 122.973,149.068 123.509 M159.836 123.417 C 159.690 123.563,159.605 124.165,159.626 124.900 L 159.661 126.138 159.780 124.808 L 159.898 123.478 161.228 123.360 L 162.558 123.242 161.320 123.207 C 160.584 123.186,159.982 123.271,159.836 123.417 M170.858 124.246 C 170.866 124.724,170.952 125.299,171.050 125.524 C 171.173 125.809,171.223 125.544,171.213 124.655 C 171.206 123.951,171.120 123.376,171.022 123.376 C 170.924 123.376,170.850 123.767,170.858 124.246 M325.416 137.289 C 325.416 144.885,325.442 147.992,325.473 144.194 C 325.504 140.396,325.504 134.182,325.473 130.384 C 325.442 126.586,325.416 129.693,325.416 137.289 M314.118 124.501 C 314.120 124.951,314.162 125.111,314.211 124.857 C 314.260 124.602,314.258 124.234,314.207 124.039 C 314.156 123.843,314.116 124.051,314.118 124.501 M149.255 147.417 C 149.255 159.795,149.279 164.829,149.309 158.603 C 149.339 152.377,149.339 142.249,149.309 136.097 C 149.279 129.944,149.255 135.038,149.255 147.417 M159.656 127.877 C 159.656 128.609,159.693 128.908,159.739 128.542 C 159.784 128.176,159.784 127.578,159.739 127.212 C 159.693 126.847,159.656 127.146,159.656 127.877 M170.798 128.764 C 170.651 131.135,170.509 131.489,169.653 131.620 C 169.216 131.686,169.255 131.710,169.849 131.734 C 171.079 131.785,171.320 131.190,171.108 128.631 L 170.936 126.547 170.798 128.764 M31.163 127.980 C 31.164 128.655,31.202 128.906,31.248 128.539 C 31.294 128.171,31.293 127.618,31.246 127.311 C 31.199 127.003,31.162 127.304,31.163 127.980 M42.653 138.517 C 42.653 144.762,42.679 147.317,42.711 144.194 C 42.743 141.072,42.743 135.962,42.711 132.839 C 42.679 129.716,42.653 132.271,42.653 138.517 M159.568 129.866 C 159.431 130.696,159.863 131.765,160.336 131.765 C 160.660 131.765,160.658 131.740,160.307 131.483 C 160.062 131.304,159.877 130.839,159.799 130.204 C 159.686 129.284,159.668 129.258,159.568 129.866 M31.185 133.811 C 31.185 135.893,31.215 136.744,31.252 135.703 C 31.289 134.662,31.289 132.959,31.252 131.918 C 31.215 130.877,31.185 131.729,31.185 133.811 M193.016 132.072 C 193.016 133.197,193.051 133.631,193.092 133.037 C 193.134 132.442,193.133 131.521,193.091 130.991 C 193.049 130.460,193.015 130.946,193.016 132.072 M242.813 137.433 C 243.066 137.482,243.481 137.482,243.734 137.433 C 243.987 137.385,243.780 137.345,243.274 137.345 C 242.767 137.345,242.560 137.385,242.813 137.433 M286.496 137.430 C 286.693 137.482,287.015 137.482,287.212 137.430 C 287.409 137.379,287.248 137.336,286.854 137.336 C 286.460 137.336,286.299 137.379,286.496 137.430 M85.169 137.640 C 85.480 137.687,85.940 137.686,86.192 137.638 C 86.444 137.589,86.189 137.551,85.627 137.552 C 85.064 137.554,84.858 137.593,85.169 137.640 M88.954 137.638 C 89.208 137.687,89.577 137.685,89.772 137.634 C 89.968 137.583,89.760 137.543,89.309 137.545 C 88.859 137.547,88.699 137.589,88.954 137.638 M126.189 137.644 C 126.780 137.686,127.747 137.686,128.338 137.644 C 128.928 137.603,128.445 137.569,127.263 137.569 C 126.082 137.569,125.598 137.603,126.189 137.644 M204.246 137.635 C 204.442 137.686,204.765 137.686,204.962 137.635 C 205.159 137.583,204.997 137.541,204.604 137.541 C 204.210 137.541,204.049 137.583,204.246 137.635 M240.870 137.635 C 241.066 137.686,241.389 137.686,241.586 137.635 C 241.783 137.583,241.621 137.541,241.228 137.541 C 240.834 137.541,240.673 137.583,240.870 137.635 M284.555 137.638 C 284.809 137.687,285.178 137.685,285.373 137.634 C 285.569 137.583,285.361 137.543,284.910 137.545 C 284.460 137.547,284.300 137.589,284.555 137.638 M289.156 137.635 C 289.353 137.686,289.675 137.686,289.872 137.635 C 290.069 137.583,289.908 137.541,289.514 137.541 C 289.120 137.541,288.959 137.583,289.156 137.635 M367.011 137.642 C 367.379 137.687,367.932 137.686,368.239 137.640 C 368.546 137.593,368.246 137.556,367.570 137.557 C 366.895 137.558,366.644 137.596,367.011 137.642 M31.196 150.691 C 31.196 157.893,31.222 160.809,31.253 157.172 C 31.284 153.535,31.284 147.642,31.253 144.077 C 31.222 140.513,31.196 143.488,31.196 150.691 M55.396 138.252 C 55.650 138.301,56.064 138.301,56.317 138.252 C 56.570 138.203,56.363 138.163,55.857 138.163 C 55.350 138.163,55.143 138.203,55.396 138.252 M198.556 138.426 C 198.165 138.739,198.165 138.741,198.568 138.556 C 198.793 138.452,199.115 138.316,199.284 138.254 C 199.549 138.155,199.547 138.138,199.272 138.124 C 199.096 138.115,198.774 138.251,198.556 138.426 M342.254 138.256 C 342.622 138.301,343.174 138.300,343.482 138.254 C 343.789 138.207,343.488 138.170,342.813 138.171 C 342.138 138.172,341.887 138.210,342.254 138.256 M347.300 138.276 C 347.827 138.397,347.864 138.452,347.604 138.721 C 347.442 138.890,347.142 139.304,346.937 139.642 C 346.642 140.128,346.716 140.085,347.289 139.437 C 348.128 138.490,348.130 138.224,347.299 138.174 L 346.701 138.137 347.300 138.276 M53.286 138.977 L 52.685 139.642 53.350 139.041 C 53.970 138.481,54.109 138.312,53.951 138.312 C 53.916 138.312,53.617 138.611,53.286 138.977 M120.254 138.704 C 119.362 139.276,119.319 139.406,120.153 139.010 C 120.575 138.809,120.921 138.570,120.921 138.479 C 120.921 138.272,120.936 138.267,120.254 138.704 M170.862 139.437 C 170.870 140.310,170.924 140.547,171.049 140.256 C 171.288 139.698,171.288 138.888,171.049 138.517 C 170.909 138.301,170.854 138.573,170.862 139.437 M335.859 139.128 C 335.537 139.465,335.316 139.783,335.368 139.835 C 335.420 139.887,335.716 139.612,336.027 139.223 C 336.720 138.354,336.642 138.310,335.859 139.128 M78.249 139.039 C 77.858 139.353,77.858 139.355,78.261 139.169 C 78.486 139.066,78.808 138.930,78.977 138.867 C 79.242 138.769,79.240 138.751,78.965 138.737 C 78.790 138.728,78.467 138.864,78.249 139.039 M159.638 139.335 C 159.638 139.729,159.680 139.890,159.732 139.693 C 159.783 139.496,159.783 139.174,159.732 138.977 C 159.680 138.780,159.638 138.941,159.638 139.335 M376.726 138.942 C 376.923 139.057,377.084 139.336,377.084 139.562 C 377.084 139.788,377.176 139.916,377.289 139.847 C 377.697 139.594,377.162 138.713,376.609 138.727 C 376.477 138.731,376.529 138.828,376.726 138.942 M192.989 139.744 C 192.989 140.138,193.031 140.299,193.082 140.102 C 193.134 139.905,193.134 139.583,193.082 139.386 C 193.031 139.189,192.989 139.350,192.989 139.744 M76.841 139.648 C 76.330 140.035,76.519 140.032,77.266 139.643 C 77.588 139.475,77.714 139.340,77.545 139.343 C 77.376 139.346,77.059 139.483,76.841 139.648 M231.867 140.060 C 231.276 140.447,230.793 140.809,230.793 140.865 C 230.793 140.947,232.907 139.683,233.231 139.407 C 233.639 139.061,232.721 139.500,231.867 140.060 M135.652 141.074 C 136.034 141.468,136.392 141.790,136.449 141.790 C 136.505 141.790,136.239 141.468,135.857 141.074 C 135.475 140.680,135.117 140.358,135.060 140.358 C 135.004 140.358,135.270 140.680,135.652 141.074 M214.072 141.586 C 214.382 141.980,214.749 142.433,214.888 142.594 C 215.027 142.755,215.301 143.123,215.497 143.413 C 215.694 143.702,215.855 143.855,215.855 143.753 C 215.857 143.519,214.306 141.497,213.849 141.138 C 213.661 140.990,213.762 141.192,214.072 141.586 M62.404 141.688 C 62.140 141.969,62.009 142.197,62.113 142.193 C 62.288 142.187,63.131 141.176,62.961 141.176 C 62.919 141.176,62.668 141.407,62.404 141.688 M170.919 143.529 C 170.919 144.655,170.954 145.089,170.995 144.494 C 171.037 143.900,171.036 142.979,170.994 142.448 C 170.952 141.918,170.918 142.404,170.919 143.529 M159.665 143.836 C 159.665 144.905,159.699 145.343,159.741 144.808 C 159.783 144.274,159.783 143.399,159.741 142.864 C 159.699 142.330,159.665 142.767,159.665 143.836 M101.863 142.523 C 101.980 142.758,102.214 143.065,102.384 143.206 C 102.553 143.347,102.931 143.868,103.222 144.365 C 103.513 144.862,103.862 145.267,103.998 145.265 C 104.155 145.263,104.170 145.207,104.039 145.112 C 103.925 145.029,103.583 144.593,103.279 144.143 C 102.552 143.068,101.583 141.959,101.863 142.523 M71.611 144.246 C 71.371 144.583,71.220 144.859,71.276 144.859 C 71.333 144.859,71.575 144.583,71.816 144.246 C 72.056 143.908,72.207 143.632,72.151 143.632 C 72.094 143.632,71.852 143.908,71.611 144.246 M331.752 144.587 C 331.437 145.001,331.283 145.274,331.411 145.195 C 331.673 145.033,332.559 143.836,332.417 143.836 C 332.366 143.836,332.067 144.174,331.752 144.587 M48.696 144.859 C 48.455 145.197,48.305 145.473,48.361 145.473 C 48.417 145.473,48.660 145.197,48.900 144.859 C 49.141 144.522,49.291 144.246,49.235 144.246 C 49.179 144.246,48.936 144.522,48.696 144.859 M130.026 144.655 C 129.768 144.766,129.730 144.831,129.923 144.831 C 130.092 144.831,130.414 144.751,130.639 144.655 C 130.897 144.544,130.935 144.479,130.742 144.479 C 130.573 144.479,130.251 144.558,130.026 144.655 M374.629 144.757 C 375.598 145.130,376.133 145.124,375.271 144.749 C 374.892 144.585,374.432 144.457,374.248 144.466 C 374.064 144.474,374.235 144.605,374.629 144.757 M83.367 145.836 C 83.137 146.030,82.817 146.373,82.655 146.598 C 82.493 146.824,82.703 146.685,83.122 146.292 C 83.541 145.898,83.884 145.552,83.885 145.524 C 83.890 145.422,83.777 145.490,83.367 145.836 M135.329 146.292 C 136.401 147.541,136.616 147.737,136.114 147.008 C 135.882 146.670,135.433 146.164,135.115 145.882 C 134.732 145.543,134.804 145.680,135.329 146.292 M351.997 145.768 C 351.934 145.930,351.920 146.230,351.964 146.433 C 352.014 146.664,352.084 146.553,352.150 146.138 C 352.262 145.441,352.189 145.267,351.997 145.768 M238.749 146.051 C 238.358 146.507,237.719 147.762,237.824 147.867 C 237.866 147.909,238.052 147.640,238.238 147.271 C 238.424 146.901,238.723 146.391,238.904 146.138 C 239.297 145.585,239.196 145.528,238.749 146.051 M203.887 146.726 C 204.338 147.233,204.738 147.625,204.777 147.597 C 204.905 147.507,204.128 146.585,203.592 146.190 C 203.251 145.938,203.353 146.124,203.887 146.726 M126.826 146.445 C 126.237 147.156,125.988 147.519,126.089 147.519 C 126.145 147.519,126.438 147.197,126.738 146.803 C 127.296 146.072,127.363 145.796,126.826 146.445 M170.938 155.703 C 170.938 160.598,170.965 162.601,170.997 160.153 C 171.030 157.706,171.030 153.701,170.997 151.253 C 170.965 148.806,170.938 150.808,170.938 155.703 M339.826 148.625 C 339.366 149.172,338.575 150.465,338.875 150.179 C 339.162 149.906,340.480 148.086,340.423 148.042 C 340.387 148.015,340.119 148.277,339.826 148.625 M113.069 148.652 C 112.999 148.835,112.952 149.231,112.965 149.531 C 112.982 149.940,113.028 149.871,113.148 149.258 C 113.317 148.389,113.280 148.102,113.069 148.652 M268.928 148.837 C 268.865 148.999,268.851 149.299,268.895 149.502 C 268.945 149.733,269.015 149.622,269.081 149.207 C 269.193 148.510,269.120 148.336,268.928 148.837 M304.877 148.951 C 304.883 149.120,304.967 149.442,305.064 149.668 L 305.240 150.077 305.251 149.668 C 305.257 149.442,305.173 149.120,305.064 148.951 C 304.888 148.679,304.867 148.679,304.877 148.951 M44.446 150.501 C 44.193 150.886,44.027 151.202,44.076 151.202 C 44.219 151.202,45.066 149.960,44.982 149.875 C 44.940 149.833,44.699 150.115,44.446 150.501 M305.320 150.895 C 305.322 151.345,305.364 151.505,305.413 151.251 C 305.462 150.996,305.460 150.628,305.409 150.432 C 305.358 150.237,305.318 150.445,305.320 150.895 M217.814 150.691 C 217.893 150.916,218.027 151.422,218.112 151.816 C 218.262 152.520,218.265 152.521,218.281 151.918 C 218.290 151.581,218.156 151.074,217.984 150.793 C 217.778 150.458,217.720 150.422,217.814 150.691 M268.464 151.222 C 268.338 151.582,268.242 152.070,268.249 152.307 C 268.257 152.543,268.387 152.276,268.538 151.714 C 268.851 150.548,268.805 150.242,268.464 151.222 M249.435 151.202 C 249.426 151.483,249.507 151.852,249.616 152.020 C 249.869 152.411,249.869 151.991,249.616 151.202 L 249.453 150.691 249.435 151.202 M193.007 152.225 C 193.007 152.957,193.044 153.256,193.089 152.890 C 193.135 152.524,193.135 151.926,193.089 151.560 C 193.044 151.194,193.007 151.494,193.007 152.225 M337.567 151.560 C 336.979 152.271,336.729 152.634,336.830 152.634 C 336.887 152.634,337.179 152.312,337.480 151.918 C 338.037 151.187,338.105 150.911,337.567 151.560 M293.457 152.634 C 293.457 153.141,293.497 153.348,293.546 153.095 C 293.595 152.841,293.595 152.427,293.546 152.174 C 293.497 151.921,293.457 152.128,293.457 152.634 M205.846 153.061 C 205.853 153.558,205.944 154.148,206.047 154.373 C 206.170 154.643,206.191 154.365,206.109 153.555 C 205.959 152.071,205.826 151.822,205.846 153.061 M112.379 153.555 C 112.381 154.005,112.423 154.165,112.472 153.911 C 112.521 153.656,112.519 153.288,112.468 153.092 C 112.417 152.897,112.377 153.105,112.379 153.555 M249.898 154.987 C 249.898 156.225,249.932 156.705,249.972 156.054 C 250.013 155.403,250.013 154.390,249.972 153.803 C 249.930 153.217,249.897 153.749,249.898 154.987 M224.516 154.885 C 224.516 155.616,224.553 155.916,224.598 155.550 C 224.644 155.184,224.644 154.586,224.598 154.220 C 224.553 153.854,224.516 154.153,224.516 154.885 M192.989 154.885 C 192.989 155.279,193.031 155.440,193.082 155.243 C 193.134 155.046,193.134 154.724,193.082 154.527 C 193.031 154.330,192.989 154.491,192.989 154.885 M375.857 154.973 C 375.857 155.022,376.156 155.268,376.522 155.521 L 377.187 155.981 376.691 155.433 C 376.248 154.944,375.857 154.728,375.857 154.973 M124.662 157.033 C 124.664 157.596,124.703 157.802,124.750 157.491 C 124.797 157.180,124.796 156.719,124.748 156.468 C 124.699 156.216,124.661 156.471,124.662 157.033 M293.457 157.954 C 293.457 158.460,293.497 158.668,293.546 158.414 C 293.595 158.161,293.595 157.747,293.546 157.494 C 293.497 157.240,293.457 157.448,293.457 157.954 M378.312 157.487 C 378.312 157.581,378.460 157.869,378.640 158.127 C 378.821 158.385,379.043 158.843,379.134 159.145 L 379.300 159.693 379.317 159.155 C 379.327 158.860,379.197 158.503,379.028 158.363 C 378.859 158.223,378.721 157.987,378.721 157.839 C 378.721 157.690,378.629 157.512,378.517 157.442 C 378.404 157.373,378.312 157.393,378.312 157.487 M42.688 159.102 C 42.616 159.627,42.573 161.080,42.591 162.330 C 42.624 164.586,42.626 164.579,42.767 161.432 C 42.917 158.069,42.900 157.557,42.688 159.102 M44.809 158.300 C 44.810 158.391,45.085 158.880,45.422 159.386 C 45.759 159.893,46.034 160.204,46.035 160.079 C 46.035 159.953,45.852 159.616,45.627 159.330 C 45.402 159.044,45.217 158.715,45.217 158.599 C 45.217 158.482,45.125 158.330,45.013 158.261 C 44.900 158.191,44.809 158.209,44.809 158.300 M93.961 158.772 C 93.961 159.166,94.003 159.327,94.054 159.130 C 94.106 158.934,94.106 158.611,94.054 158.414 C 94.003 158.217,93.961 158.379,93.961 158.772 M268.235 158.658 C 268.235 158.933,268.311 159.204,268.403 159.261 C 268.495 159.318,268.531 159.093,268.482 158.762 C 268.375 158.030,268.235 157.972,268.235 158.658 M249.553 158.778 C 249.478 159.056,249.425 159.514,249.435 159.795 C 249.448 160.163,249.506 160.080,249.641 159.502 C 249.849 158.616,249.770 157.967,249.553 158.778 M124.824 159.898 C 124.823 160.123,124.954 160.537,125.115 160.818 C 125.489 161.472,125.490 161.332,125.121 160.307 C 124.959 159.857,124.825 159.673,124.824 159.898 M325.388 161.637 C 325.388 162.481,325.425 162.826,325.469 162.404 C 325.513 161.982,325.513 161.292,325.469 160.870 C 325.425 160.448,325.388 160.793,325.388 161.637 M112.965 160.846 C 112.952 161.143,113.084 161.695,113.259 162.074 C 113.465 162.519,113.531 162.582,113.446 162.251 C 113.374 161.969,113.241 161.417,113.151 161.023 C 113.011 160.407,112.985 160.382,112.965 160.846 M69.384 161.137 C 69.371 161.369,69.496 161.737,69.661 161.956 C 69.826 162.174,69.964 162.256,69.968 162.138 C 69.971 162.020,69.891 161.836,69.790 161.729 C 69.688 161.622,69.561 161.350,69.507 161.125 C 69.410 160.726,69.408 160.726,69.384 161.137 M217.458 161.432 C 217.388 161.826,217.271 162.379,217.197 162.660 C 217.117 162.961,217.197 162.879,217.389 162.461 C 217.569 162.070,217.687 161.518,217.650 161.233 C 217.593 160.788,217.566 160.816,217.458 161.432 M268.857 161.137 C 268.853 161.369,268.984 161.737,269.150 161.956 C 269.535 162.466,269.541 162.272,269.164 161.405 C 268.944 160.897,268.863 160.827,268.857 161.137 M261.102 161.442 C 261.087 161.729,260.965 162.073,260.832 162.206 C 260.699 162.339,260.645 162.504,260.713 162.572 C 260.920 162.779,261.310 161.849,261.217 161.371 C 261.139 160.968,261.127 160.976,261.102 161.442 M379.803 162.148 C 379.804 162.711,379.844 162.917,379.891 162.606 C 379.938 162.295,379.937 161.835,379.888 161.583 C 379.840 161.331,379.801 161.586,379.803 162.148 M341.893 162.046 C 342.133 162.384,342.376 162.660,342.432 162.660 C 342.488 162.660,342.338 162.384,342.097 162.046 C 341.857 161.708,341.614 161.432,341.558 161.432 C 341.502 161.432,341.652 161.708,341.893 162.046 M59.175 162.295 C 59.432 162.658,59.907 163.233,60.231 163.574 C 60.555 163.915,60.389 163.619,59.861 162.916 C 58.875 161.601,58.342 161.119,59.175 162.295 M225.277 161.841 C 225.284 162.208,225.865 163.274,225.875 162.939 C 225.879 162.811,225.745 162.443,225.577 162.121 C 225.409 161.798,225.274 161.673,225.277 161.841 M47.272 162.152 C 47.446 162.375,47.715 162.811,47.869 163.120 C 48.024 163.429,48.188 163.645,48.234 163.599 C 48.372 163.461,47.725 162.343,47.328 162.035 C 46.980 161.764,46.976 161.771,47.272 162.152 M281.330 162.086 C 281.330 162.151,281.467 162.468,281.636 162.790 C 281.804 163.112,281.939 163.238,281.936 163.069 C 281.933 162.900,281.796 162.583,281.630 162.365 C 281.465 162.147,281.330 162.021,281.330 162.086 M369.166 163.069 C 369.166 163.688,369.205 163.941,369.251 163.632 C 369.298 163.322,369.298 162.816,369.251 162.506 C 369.205 162.197,369.166 162.450,369.166 163.069 M82.455 163.651 C 82.455 163.910,84.307 165.729,84.571 165.729 C 84.670 165.729,84.377 165.430,83.920 165.064 C 83.464 164.698,83.085 164.295,83.080 164.168 C 83.065 163.858,82.455 163.352,82.455 163.651 M290.819 164.820 C 289.914 165.795,289.888 166.017,290.770 165.241 C 291.220 164.844,291.917 163.860,291.721 163.899 C 291.689 163.905,291.283 164.320,290.819 164.820 M135.175 164.535 C 134.968 164.760,134.838 164.983,134.884 165.029 C 134.931 165.075,135.184 164.884,135.448 164.603 C 135.712 164.322,135.843 164.100,135.739 164.109 C 135.635 164.118,135.381 164.310,135.175 164.535 M31.182 167.468 C 31.182 169.156,31.214 169.819,31.252 168.942 C 31.290 168.065,31.290 166.684,31.251 165.873 C 31.213 165.062,31.181 165.780,31.182 167.468 M90.946 165.157 L 90.332 165.801 90.991 165.346 C 91.681 164.870,92.007 164.497,91.726 164.507 C 91.635 164.510,91.284 164.803,90.946 165.157 M352.071 164.655 C 352.030 164.739,352.045 165.361,352.105 166.036 L 352.214 167.263 352.322 166.044 C 352.418 164.959,352.486 164.809,352.941 164.683 C 353.417 164.552,353.407 164.541,352.800 164.522 C 352.441 164.510,352.113 164.570,352.071 164.655 M61.507 165.590 C 61.704 166.004,61.941 166.343,62.033 166.343 C 62.124 166.343,62.199 166.516,62.199 166.728 C 62.199 166.942,62.383 167.161,62.611 167.221 C 62.967 167.314,62.939 167.223,62.407 166.551 C 62.068 166.123,61.790 165.682,61.790 165.571 C 61.790 165.460,61.646 165.250,61.469 165.103 C 61.198 164.878,61.204 164.954,61.507 165.590 M159.670 167.366 C 159.670 168.772,159.702 169.348,159.742 168.645 C 159.782 167.941,159.782 166.790,159.742 166.087 C 159.702 165.384,159.670 165.959,159.670 167.366 M42.603 168.298 C 42.545 172.507,42.748 172.252,39.386 172.330 L 36.726 172.392 39.398 172.436 C 43.022 172.497,42.787 172.777,42.711 168.490 L 42.649 165.013 42.603 168.298 M103.775 165.361 C 103.640 165.496,103.529 165.718,103.529 165.855 C 103.529 165.992,103.414 166.150,103.274 166.207 C 103.094 166.280,103.090 166.315,103.259 166.327 C 103.391 166.335,103.637 166.066,103.806 165.729 C 104.143 165.052,104.139 164.997,103.775 165.361 M283.683 165.432 C 284.286 165.914,284.809 166.175,284.803 165.992 C 284.800 165.903,284.455 165.668,284.036 165.469 C 283.422 165.177,283.353 165.170,283.683 165.432 M200.102 166.049 C 199.651 166.219,199.538 166.320,199.795 166.322 C 200.020 166.323,200.481 166.198,200.818 166.043 C 201.600 165.686,201.051 165.690,200.102 166.049 M258.824 166.343 C 258.583 166.680,258.432 166.957,258.489 166.957 C 258.545 166.957,258.788 166.680,259.028 166.343 C 259.269 166.005,259.419 165.729,259.363 165.729 C 259.307 165.729,259.064 166.005,258.824 166.343 M356.419 165.797 C 356.419 165.850,356.717 165.997,357.080 166.124 C 357.443 166.250,357.650 166.270,357.540 166.167 C 357.307 165.949,356.419 165.656,356.419 165.797 M170.844 166.820 C 170.844 167.345,170.924 167.775,171.021 167.775 C 171.204 167.775,171.139 166.160,170.949 165.971 C 170.891 165.913,170.844 166.295,170.844 166.820 M344.757 166.177 C 344.757 166.234,344.941 166.492,345.166 166.752 C 345.391 167.011,345.575 167.132,345.575 167.020 C 345.575 166.907,345.391 166.649,345.166 166.445 C 344.941 166.241,344.757 166.121,344.757 166.177 M102.199 167.545 C 101.665 168.147,101.563 168.333,101.904 168.081 C 102.440 167.686,103.217 166.764,103.089 166.674 C 103.050 166.646,102.650 167.038,102.199 167.545 M215.205 167.366 C 214.960 167.792,214.942 167.925,215.137 167.850 C 215.370 167.761,215.723 166.959,215.589 166.825 C 215.563 166.799,215.390 167.043,215.205 167.366 M257.391 168.082 C 256.894 168.588,256.534 169.003,256.590 169.003 C 256.646 169.003,257.099 168.588,257.596 168.082 C 258.093 167.575,258.453 167.161,258.397 167.161 C 258.341 167.161,257.888 167.575,257.391 168.082 M272.123 167.501 C 272.123 167.612,272.376 167.927,272.685 168.200 L 273.248 168.696 272.737 168.082 C 272.455 167.744,272.202 167.430,272.174 167.383 C 272.146 167.336,272.123 167.389,272.123 167.501 M300.563 168.696 C 300.066 169.202,299.705 169.616,299.761 169.616 C 299.818 169.616,300.270 169.202,300.767 168.696 C 301.264 168.189,301.625 167.775,301.569 167.775 C 301.512 167.775,301.060 168.189,300.563 168.696 M325.388 169.207 C 325.388 170.051,325.425 170.396,325.469 169.974 C 325.513 169.552,325.513 168.862,325.469 168.440 C 325.425 168.018,325.388 168.363,325.388 169.207 M135.448 169.719 C 134.951 170.225,134.590 170.639,134.646 170.639 C 134.703 170.639,135.155 170.225,135.652 169.719 C 136.149 169.212,136.510 168.798,136.453 168.798 C 136.397 168.798,135.945 169.212,135.448 169.719 M117.238 169.719 C 117.620 170.113,117.978 170.435,118.034 170.435 C 118.091 170.435,117.824 170.113,117.442 169.719 C 117.061 169.325,116.702 169.003,116.646 169.003 C 116.590 169.003,116.856 169.325,117.238 169.719 M213.491 169.668 L 212.890 170.332 213.555 169.732 C 214.175 169.171,214.314 169.003,214.156 169.003 C 214.121 169.003,213.821 169.302,213.491 169.668 M192.379 170.128 C 192.381 170.578,192.423 170.738,192.472 170.484 C 192.521 170.229,192.519 169.861,192.468 169.665 C 192.417 169.470,192.377 169.678,192.379 170.128 M170.924 170.578 C 170.958 171.164,170.892 171.738,170.775 171.854 C 170.520 172.109,170.728 172.372,171.035 172.182 C 171.285 172.028,171.284 171.026,171.033 170.128 C 170.895 169.634,170.874 169.722,170.924 170.578 M298.619 170.122 C 298.281 170.398,298.120 170.628,298.261 170.632 C 298.402 170.636,298.517 170.569,298.517 170.482 C 298.517 170.396,298.770 170.168,299.079 169.976 C 299.389 169.784,299.550 169.625,299.437 169.623 C 299.325 169.620,298.957 169.845,298.619 170.122 M254.425 170.435 C 254.087 170.658,253.903 170.841,254.015 170.841 C 254.128 170.841,254.496 170.658,254.834 170.435 C 255.171 170.211,255.355 170.028,255.243 170.028 C 255.130 170.028,254.762 170.211,254.425 170.435 M314.150 171.135 C 314.164 172.027,314.250 172.368,314.476 172.429 C 314.690 172.487,314.709 172.460,314.539 172.338 C 314.405 172.243,314.259 171.661,314.213 171.044 L 314.130 169.923 314.150 171.135 M98.448 170.533 C 97.622 170.989,97.504 171.245,98.283 170.892 C 98.693 170.706,99.028 170.481,99.028 170.392 C 99.028 170.204,99.061 170.196,98.448 170.533 M351.946 170.537 C 351.936 170.762,352.120 171.176,352.356 171.458 L 352.785 171.969 352.477 171.449 C 352.308 171.163,352.123 170.749,352.067 170.529 C 351.968 170.138,351.965 170.138,351.946 170.537 M31.130 171.297 C 31.090 172.305,31.518 172.518,33.405 172.428 L 34.885 172.358 33.324 172.317 C 31.636 172.273,31.395 172.137,31.251 171.151 C 31.169 170.589,31.158 170.601,31.130 171.297 M149.104 171.394 C 148.966 172.167,148.886 172.258,148.286 172.333 L 147.621 172.415 148.261 172.448 C 149.063 172.489,149.408 172.089,149.322 171.215 C 149.257 170.540,149.256 170.541,149.104 171.394 M159.536 171.236 C 159.477 171.460,159.556 171.809,159.711 172.011 C 159.962 172.338,159.979 172.300,159.865 171.662 C 159.706 170.773,159.669 170.726,159.536 171.236 M197.136 171.349 C 197.473 171.626,197.836 171.856,197.943 171.860 C 198.049 171.864,197.824 171.637,197.442 171.355 C 196.551 170.698,196.335 170.693,197.136 171.349 M65.795 171.697 C 65.898 172.154,65.840 172.258,65.440 172.334 C 65.065 172.405,65.103 172.431,65.615 172.453 C 66.453 172.489,66.598 172.236,66.083 171.633 L 65.672 171.151 65.795 171.697 M78.465 171.567 C 78.803 171.722,79.217 171.849,79.386 171.850 C 79.555 171.850,79.383 171.716,79.005 171.552 C 78.135 171.174,77.638 171.189,78.465 171.567 M372.788 171.577 C 372.502 171.736,372.412 171.859,372.583 171.857 C 372.752 171.856,373.069 171.719,373.287 171.554 C 373.780 171.181,373.476 171.195,372.788 171.577 M138.326 171.572 C 138.284 172.230,138.838 172.504,140.057 172.429 L 141.279 172.354 140.031 172.315 C 138.960 172.282,138.752 172.211,138.562 171.816 C 138.440 171.563,138.333 171.453,138.326 171.572 M94.834 172.072 C 94.764 172.184,94.414 172.290,94.054 172.307 C 93.439 172.336,93.434 172.342,93.962 172.423 C 94.270 172.469,94.727 172.364,94.979 172.187 C 95.231 172.011,95.329 171.867,95.198 171.867 C 95.067 171.867,94.903 171.959,94.834 172.072 M120.921 172.153 C 121.202 172.325,121.680 172.470,121.983 172.474 C 122.286 172.478,122.590 172.573,122.660 172.685 C 122.729 172.798,122.942 172.887,123.132 172.884 C 123.667 172.874,122.840 172.443,121.949 172.266 C 121.552 172.187,121.043 172.059,120.818 171.981 C 120.547 171.887,120.582 171.945,120.921 172.153 M250.322 172.054 C 250.215 172.157,249.898 172.283,249.616 172.333 L 249.105 172.425 249.628 172.453 C 249.916 172.468,250.331 172.346,250.549 172.180 C 250.768 172.015,250.850 171.877,250.731 171.874 C 250.613 171.870,250.429 171.951,250.322 172.054 M348.849 172.045 C 348.849 172.157,348.642 172.288,348.389 172.336 C 347.986 172.414,347.997 172.429,348.479 172.453 C 349.059 172.482,349.410 172.190,349.057 171.971 C 348.943 171.901,348.849 171.934,348.849 172.045 M354.271 172.181 C 354.609 172.336,355.069 172.460,355.294 172.458 C 355.519 172.455,355.289 172.323,354.783 172.163 C 353.647 171.805,353.464 171.812,354.271 172.181 M181.863 172.328 C 181.966 172.431,182.268 172.481,182.534 172.439 C 182.943 172.375,182.915 172.346,182.347 172.252 C 181.940 172.184,181.749 172.215,181.863 172.328 M35.243 172.417 C 35.440 172.469,35.762 172.469,35.959 172.417 C 36.156 172.366,35.995 172.324,35.601 172.324 C 35.207 172.324,35.046 172.366,35.243 172.417 M59.386 172.428 C 60.258 172.467,61.685 172.467,62.558 172.428 C 63.430 172.390,62.716 172.359,60.972 172.359 C 59.228 172.359,58.514 172.390,59.386 172.428 M143.069 172.428 C 143.829 172.467,145.072 172.467,145.831 172.428 C 146.591 172.389,145.969 172.356,144.450 172.356 C 142.931 172.356,142.309 172.389,143.069 172.428 M161.483 172.427 C 162.018 172.469,162.893 172.469,163.427 172.427 C 163.962 172.384,163.524 172.350,162.455 172.350 C 161.386 172.350,160.949 172.384,161.483 172.427 M167.621 172.427 C 168.156 172.469,169.031 172.469,169.565 172.427 C 170.100 172.384,169.662 172.350,168.593 172.350 C 167.524 172.350,167.087 172.384,167.621 172.427 M185.320 172.429 C 186.473 172.465,188.361 172.465,189.514 172.429 C 190.668 172.392,189.724 172.363,187.417 172.363 C 185.110 172.363,184.166 172.392,185.320 172.429 M315.448 172.421 C 315.701 172.469,316.115 172.469,316.368 172.421 C 316.621 172.372,316.414 172.332,315.908 172.332 C 315.402 172.332,315.194 172.372,315.448 172.421 M319.437 172.429 C 320.535 172.466,322.330 172.466,323.427 172.429 C 324.524 172.392,323.627 172.362,321.432 172.362 C 319.238 172.362,318.340 172.392,319.437 172.429 M338.772 172.428 C 339.701 172.466,341.220 172.466,342.148 172.428 C 343.077 172.391,342.317 172.360,340.460 172.360 C 338.604 172.360,337.844 172.391,338.772 172.428 M345.936 172.421 C 346.190 172.470,346.559 172.468,346.754 172.417 C 346.950 172.366,346.742 172.326,346.292 172.328 C 345.841 172.330,345.681 172.372,345.936 172.421 M128.338 173.037 C 128.647 173.083,129.153 173.083,129.463 173.037 C 129.772 172.990,129.519 172.951,128.900 172.951 C 128.281 172.951,128.028 172.990,128.338 173.037 M202.404 173.031 C 202.601 173.083,202.923 173.083,203.120 173.031 C 203.317 172.980,203.156 172.937,202.762 172.937 C 202.368 172.937,202.207 172.980,202.404 173.031 M239.847 173.037 C 240.156 173.083,240.662 173.083,240.972 173.037 C 241.281 172.990,241.028 172.951,240.409 172.951 C 239.790 172.951,239.537 172.990,239.847 173.037 M245.476 173.035 C 245.730 173.084,246.098 173.082,246.294 173.031 C 246.490 172.979,246.281 172.939,245.831 172.942 C 245.381 172.944,245.221 172.986,245.476 173.035 M284.041 173.031 C 284.238 173.083,284.560 173.083,284.757 173.031 C 284.954 172.980,284.793 172.937,284.399 172.937 C 284.005 172.937,283.844 172.980,284.041 173.031 M359.540 173.037 C 359.849 173.083,360.355 173.083,360.665 173.037 C 360.974 172.990,360.721 172.951,360.102 172.951 C 359.483 172.951,359.230 172.990,359.540 173.037 M366.087 173.031 C 366.284 173.083,366.606 173.083,366.803 173.031 C 367.000 172.980,366.839 172.937,366.445 172.937 C 366.051 172.937,365.890 172.980,366.087 173.031 " stroke="none" fill="#6cad63" fill-rule="evenodd"></path>
                </g>
            </svg>
            <span class="sr-only">Kodibooks</span>
        </a>

        <div class="flex items-center gap-6">
            <a class="font-bold" href="/manager/login">
                Sign in
            </a>
            <a href="/partner/login" class="border-cyan-600 text-cyan-600 hidden rounded-md border px-8 py-3 text-center font-bold md:inline-block">Partnership</a>
        </div>
    </div>

    <!-- Hero Section -->
    <div class="overflow-hidden">
        <div class="relative max-w-7xl mt-8 mx-auto flex flex-col-reverse gap-10 sm:gap-0 sm:mt-16 md:mt-20 lg:mt-28">
            <div class="overflow-hidden">
                <img src="assets/hero1.png" class="w-[508px] -translate-x-12 sm:ml-auto sm:-mr-20 md:translate-x-0 md:mx-auto md:absolute md:bottom-0 md:-right-16 md:mr-0 lg:w-[809px]">
            </div>

            <div class="relative px-6 flex-1 md:pb-12 lg:pb-48">
                <h1 class="text-5xl font-bold w-full sm:max-w-[34rem]  md:max-w-2xl  lg:max-w-[46rem] ">Incredible Property Management.</h1>

                <p class="mt-5 text-xl sm:mt-8 sm:max-w-lg">
                    Kodibooks is an <span class="font-medium">online platform</span> for rental management, powered by Inspirehub. Create your account on Kodibooks and enjoy the simplicity.
                </p>

                <div class="mt-5 flex flex-col gap-5 sm:mt-10 sm:flex-row sm:items-center">
                    <a href="/manager/login" class="inline-block w-full px-14 py-4 rounded-md bg-cyan-600 border border-transparent text-white font-bold text-center sm:w-auto">Get Started</a>
                    <a href="#" class="inline-block w-full px-14 py-4 rounded-md bg-purple-50 border border-purple-200 font-bold text-center sm:w-auto">Explore</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section 1 -->
    <div class="max-w-7xl mx-auto  sm:py-3">
        <!-- Features Section 1 Heading -->
        <h2 class="text-4xl font-bold sm:text-5xl lg:text-6xl" style="text-align: center;">On-demand.<br><span class="text-cyan-600">Auto books.</span></h2>

        <p class="mt-5 text-xl" style="text-align: center;">
            You have to see it to believe it. Watch your web application and workers scale within seconds based on demand.
        </p>

        <div class="mt-10 grid gap-5 sm:grid-cols-2 sm:gap-y-12">
            <!-- Databases -->
            <div class="overflow-hidden flex flex-col gap-6 rounded-md p-6 lg:flex-row lg:items-start lg:py-10 lg:pr-24" style="background-image: linear-gradient(79.74deg, #F1EEFF 8.07%, rgba(241, 238, 255, 0) 100%);">
                <img class="-mt-8 shrink-0 lg:mt-0" width="100" height="100" src="assets/auto.png">

                <div>
                    <h2 class="text-2xl font-bold">Auto Allocations</h2>

                    <p class="mt-2 max-w-md">
                        Automation of the process of distributing received payments to specific invoices or accounts.
                    </p>
                </div>
            </div>

            <!-- Caches -->
            <div class="overflow-hidden flex flex-col gap-6 rounded-md p-6 lg:flex-row lg:items-start lg:py-10 lg:pr-24" style="background-image: linear-gradient(79.74deg, #F1EEFF 8.07%, rgba(241, 238, 255, 0) 100%);">
                <img class="-mt-8 shrink-0 lg:mt-0 " width="100" height="100" src="assets/pay.png">

                <div>
                    <h2 class="text-2xl font-bold">Instant Payments</h2>

                    <p class="mt-4">
                        Financial transactions that occur in real-time or near-real-time,
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section 2 -->
    <div class="overflow-hidden pt-24">
        <div class="max-w-7xl mx-auto px-6">
            <div class="relative bg-cyan-600 rounded-xl px-6 md:px-12">
                <img class="-translate-y-6 rounded-xl md:-translate-y-12" src="assets/dashboard2.png">

                <!-- Cube 1 -->
                <!-- <img class="absolute left-0 bottom-16 -translate-x-1/2 w-24 md:w-[134px]" src="https://d2n6cmh8j179w8.cloudfront.net/9f5a9986-56bd-4cd9-9709-7cadd1f5c199/build/assets/cube-blue-7c7e3444.png"> -->
                <!-- Cube 2 -->
                <!-- <img class="absolute -right-16 -top-24 w-28 md:w-[157px]" src="https://d2n6cmh8j179w8.cloudfront.net/9f5a9986-56bd-4cd9-9709-7cadd1f5c199/build/assets/cube-purple-f6628dfa.png"> -->
            </div>

            <div class="mt-10 grid gap-12 sm:grid-cols-2 md:mt-24 lg:grid-cols-3">
                <!-- Payment Integration -->
                <div>
                    <div class="inline-flex items-center h-12 w-12">
                        <img width="47" height="52" src="assets/integration.png">
                    </div>

                    <h2 class="mt-3 text-2xl font-bold">Payment Integration</h2>

                    <p class="mt-4">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas elit neque, luctus vitae est non,
                    </p>
                </div>

                <!-- Reminders -->
                <div>
                    <div class="inline-flex items-center h-12 w-12">
                        <img width="53" height="48" src="assets/reminder.png">
                    </div>

                    <h2 class="mt-3 text-2xl font-bold">Automated Reminders</h2>

                    <p class="mt-4">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas elit neque, luctus vitae est non,
                    </p>
                </div>

                <!-- Emails & SMS -->
                <div>
                    <div class="inline-flex items-center h-12 w-12">
                        <img width="46" height="38" src="assets/sms.png">
                    </div>

                    <h2 class="mt-3 text-2xl font-bold">Bulk Sms & Emails</h2>

                    <p class="mt-4">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas elit neque, luctus vitae est non,
                    </p>
                </div>

                <!-- Real time data  -->
                <div>
                    <div class="inline-flex items-center h-12 w-12">
                        <img width="39" height="39" src="assets/data.png">
                    </div>

                    <h2 class="mt-3 text-2xl font-bold">Real time Data</h2>

                    <p class="mt-4">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas elit neque, luctus vitae est non,
                    </p>
                </div>

                <!-- Auto Invoicing -->
                <div>
                    <div class="inline-flex items-center h-12 w-12">
                        <img width="48" height="46" src="assets/invoice.png">
                    </div>

                    <h2 class="mt-3 text-2xl font-bold">Auto Invoicing</h2>

                    <p class="mt-4">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas elit neque, luctus vitae est non,
                    </p>
                </div>

                <!-- Diverse Report generation -->
                <div>
                    <div class="inline-flex items-center h-12 w-12">
                        <img width="45" height="43" src="assets/report.png">
                    </div>

                    <h2 class="mt-3 text-2xl font-bold">Diverse Report Generations</h2>

                    <p class="mt-4">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas elit neque, luctus vitae est non,
                    </p>
                </div>

                <!-- Infinite Deployments -->
                <!-- <div>
                    <div class="inline-flex items-center h-12 w-12">
                        <img width="54" height="43" src="https://d2n6cmh8j179w8.cloudfront.net/9f5a9986-56bd-4cd9-9709-7cadd1f5c199/build/assets/infinite-deployments-07d3fe6b.png">
                    </div>

                    <h2 class="mt-3 text-2xl font-bold">Infinite Deployments</h2>

                    <p class="mt-4">
                        Vapor will manage as many imgprojects and deployments as you can throw at it. Bring it on.
                    </p>
                </div> -->

                <!-- Teams -->
                <!-- <div>
                    <div class="inline-flex items-center h-12 w-12">
                        <img width="47" height="39" src="https://d2n6cmh8j179w8.cloudfront.net/9f5a9986-56bd-4cd9-9709-7cadd1f5c199/build/assets/bring-friends-90d46353.png">
                    </div>

                    <h2 class="mt-3 text-2xl font-bold">Bring Friends</h2>

                    <p class="mt-4">
                        Organize your projects into teams and collaborate with others to build the next big thing.
                    </p>
                </div> -->

                <!-- Bring Your Own AWS -->
                <!-- <div>
                    <div class="inline-flex items-center h-12 w-12">
                        <img width="49" height="46" src="https://d2n6cmh8j179w8.cloudfront.net/9f5a9986-56bd-4cd9-9709-7cadd1f5c199/build/assets/your-own-cloud-58114f0e.png">
                    </div>

                    <h2 class="mt-3 text-2xl font-bold">Your Own Cloud</h2>

                    <p class="mt-4">
                        Link your own AWS account to Vapor and stay in total control of your cloud. We never mark-up AWS prices.
                    </p>
                </div> -->
            </div>
        </div>
    </div>

    <!-- <div class="overflow-hidden py-8 sm:py-16 md:py-24">
        <div class="mx-auto w-[120%] translate-x-[-10%]">
            <img src="https://d2n6cmh8j179w8.cloudfront.net/9f5a9986-56bd-4cd9-9709-7cadd1f5c199/build/assets/cubes-wide-1497e4f0.png" class="w-full">
        </div>
    </div> -->

    <div class="max-w-7xl mx-auto px-6 py-8 sm:py-16 md:py-24 grid gap-12 lg:grid-cols-2">
        <div>
            <h2 class="text-4xl font-bold max-w-xl sm:text-5xl">See for yourself how easy it is to get started with Kodibooks</h2>

            <p class="mt-4 text-xl max-w-xl">
                We've sweat the small stuff and crafted Kodibooks into the perfect property management platform .
            </p>

            <div class="flex items-center gap-x-6 mt-8">
                <a href="/features/painless-deployments" class="inline-block w-full px-14 py-4 rounded-md bg-purple-50 border border-purple-200 font-bold text-center sm:w-auto">Learn more</a>
                <a href="/partner/login" class="font-bold">Partner</a>
            </div>
        </div>

        <!-- Video Sample -->
        <div>
            <div class="max-w-2xl">
                <div>
                    <div class="relative mx-auto w-full rounded-lg lg:max-w-md">
                        <a href="https://www.youtube.com/" target="_blank" class="relative block w-full rounded-lg overflow-hidden focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <span class="sr-only">Watch our video to learn more</span>
                            <img class="w-full" src="assets/dashboard2.png" alt="">
                            <span class="absolute inset-0 w-full h-full flex items-center justify-center" aria-hidden="true">
                                <svg class="h-20 w-20 text-indigo-500" fill="currentColor" viewBox="0 0 84 84">
                                    <circle opacity="0.9" cx="42" cy="42" r="42" fill="white" />
                                    <path d="M55.5039 40.3359L37.1094 28.0729C35.7803 27.1869 34 28.1396 34 29.737V54.263C34 55.8604 35.7803 56.8131 37.1094 55.9271L55.5038 43.6641C56.6913 42.8725 56.6913 41.1275 55.5039 40.3359Z" />
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-8 sm:py-16 md:py-24 grid gap-12 lg:grid-cols-2">
        <!-- PARTNERSHIP AREA -->
        <div>
            <div class="max-w-2xl">
                <div>
                    <div class="relative mx-auto w-full rounded-lg lg:max-w-md">
                            <img class="w-full" src="assets/partner.svg" alt="">
                            <span class="absolute inset-0 w-full h-full flex items-center justify-center" aria-hidden="true">
                            </span>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <h2 class="text-4xl font-bold max-w-xl sm:text-5xl">Partner With Us.</h2>

            <p class="mt-4 text-xl max-w-xl">
            Our innovative product promises to revolutionize the market, providing a unique solution that meets the evolving needs of consumers. Collaborate with us to tap into a dynamic market, enjoy attractive incentives, and be part of a winning team driving success. 
            </p>

            <div class="flex items-center gap-x-6 mt-8">
                <a href="/partner/login" class="inline-block text-white w-full px-14 py-4 rounded-md bg-cyan-600 border border-purple-200 font-bold text-center sm:w-auto">Partner With Us.</a>
            </div>
        </div>
    </div>

    <!-- Pricing Table -->
    <div class="max-w-7xl mx-auto lg:relative lg:pt-10 lg:pb-32">
        <div class="max-w-2xl">
            <h2 class="text-4xl font-bold">
                Simple, fixed pricing.<br> <span class="text-cyan-600">Freedom of management.</span>
            </h2>

            <p class="mt-4 text-xl">
                Kodibooks has dead simple pricing. We'll handle all the management and payments you can throw at us.
            </p>
        </div>

        <div class="mt-12 flex flex-col gap-5 md:flex-row">
            <div class="flex flex-col justify-between backdrop-blur-md rounded-lg p-10 w-full" style="background-image: linear-gradient(79.74deg, rgba(241, 238, 255, 0.9) 8.07%, rgba(241, 238, 255, 0) 100%);">
                <div>
                    <div class="flex items-center justify-between gap-20">
                        <div>
                            <div class="text-2xl font-bold">
                                Bronze Plan
                            </div>
                            <div>
                                <span class="text-[56px] font-bold">$15</span>
                                <span>/month</span>
                            </div>
                            <div class="mt-2">
                                Simple month-to-month pricing.
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="mt-2 flex items-center gap-6">
                        <img width="30" height="30" src="https://d2n6cmh8j179w8.cloudfront.net/9f5a9986-56bd-4cd9-9709-7cadd1f5c199/build/assets/deployments-light-1c77f0a9.png">
                        <span><span class="font-bold">Auto</span> Allocations</span>
                    </div>

                    <div class="mt-4 flex items-center gap-6">
                        <img width="30" height="30" src="https://d2n6cmh8j179w8.cloudfront.net/9f5a9986-56bd-4cd9-9709-7cadd1f5c199/build/assets/deployments-light-1c77f0a9.png">
                        <span><span class="font-bold">Instant</span> Payments</span>
                    </div>
                    <div class="mt-4 flex items-center gap-6">
                        <img width="30" height="30" src="https://d2n6cmh8j179w8.cloudfront.net/9f5a9986-56bd-4cd9-9709-7cadd1f5c199/build/assets/deployments-light-1c77f0a9.png">
                        <span><span class="font-bold">Reliable</span> Reporting</span>
                    </div>
                    <div class="mt-4 flex items-center gap-6">
                        <img width="30" height="30" src="https://d2n6cmh8j179w8.cloudfront.net/9f5a9986-56bd-4cd9-9709-7cadd1f5c199/build/assets/deployments-light-1c77f0a9.png">
                        <span><span class="font-bold">1 - 30</span> Units</span>
                    </div>
                    <div class="mt-2 border-t border-[#DDD8FF]"></div>

                    <div class="mt-2">
                        <a href="/login" class="inline-block px-14 py-4 rounded-md bg-cyan-600 border border-transparent text-white font-bold text-center">Get Started</a>
                    </div>
                </div>
            </div>

            <div class="flex flex-col justify-between backdrop-blur-md rounded-lg p-10 w-full" style="background-image: linear-gradient(79.74deg, rgba(241, 238, 255, 0.9) 8.07%, rgba(241, 238, 255, 0) 100%);">
                <div>
                    <div class="flex items-center justify-between gap-20">
                        <div>
                            <div class="text-2xl font-bold">
                                Silver Plan
                            </div>
                            <div>
                                <span class="text-[56px] font-bold">$20</span>
                                <span>/month</span>
                            </div>
                            <div class="mt-2">
                                Simple month-to-month pricing.
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="mt-2 flex items-center gap-6">
                        <img width="30" height="30" src="https://d2n6cmh8j179w8.cloudfront.net/9f5a9986-56bd-4cd9-9709-7cadd1f5c199/build/assets/deployments-light-1c77f0a9.png">
                        <span><span class="font-bold">Auto</span> Allocations</span>
                    </div>

                    <div class="mt-4 flex items-center gap-6">
                        <img width="30" height="30" src="https://d2n6cmh8j179w8.cloudfront.net/9f5a9986-56bd-4cd9-9709-7cadd1f5c199/build/assets/deployments-light-1c77f0a9.png">
                        <span><span class="font-bold">Instant</span> Payments</span>
                    </div>
                    <div class="mt-4 flex items-center gap-6">
                        <img width="30" height="30" src="https://d2n6cmh8j179w8.cloudfront.net/9f5a9986-56bd-4cd9-9709-7cadd1f5c199/build/assets/deployments-light-1c77f0a9.png">
                        <span><span class="font-bold">Reliable</span> Reporting</span>
                    </div>
                    <div class="mt-4 flex items-center gap-6">
                        <img width="30" height="30" src="https://d2n6cmh8j179w8.cloudfront.net/9f5a9986-56bd-4cd9-9709-7cadd1f5c199/build/assets/deployments-light-1c77f0a9.png">
                        <span><span class="font-bold">31 - 50</span> Units</span>
                    </div>
                    <div class="mt-2 border-t border-[#DDD8FF]"></div>

                    <div class="mt-2">
                        <a href="/manager/login" class="inline-block px-14 py-4 rounded-md bg-cyan-600 border border-transparent text-white font-bold text-center">Get Started</a>
                    </div>
                </div>
            </div>
            <div class="flex flex-col justify-between backdrop-blur-md rounded-lg p-10 w-full" style="background-image: linear-gradient(79.74deg, rgba(241, 238, 255, 0.9) 8.07%, rgba(241, 238, 255, 0) 100%);">
                <div>
                    <div class="flex items-center justify-between gap-20">
                        <div>
                            <div class="text-2xl font-bold">
                                Gold Plan
                            </div>
                            <div>
                                <span class="text-[56px] font-bold">$25</span>
                                <span>/month</span>
                            </div>
                            <div class="mt-2">
                                Simple month-to-month pricing.
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="mt-2 flex items-center gap-6">
                        <img width="30" height="30" src="https://d2n6cmh8j179w8.cloudfront.net/9f5a9986-56bd-4cd9-9709-7cadd1f5c199/build/assets/deployments-light-1c77f0a9.png">
                        <span><span class="font-bold">Auto</span> Allocations</span>
                    </div>

                    <div class="mt-4 flex items-center gap-6">
                        <img width="30" height="30" src="https://d2n6cmh8j179w8.cloudfront.net/9f5a9986-56bd-4cd9-9709-7cadd1f5c199/build/assets/deployments-light-1c77f0a9.png">
                        <span><span class="font-bold">Instant</span> Payments</span>
                    </div>
                    <div class="mt-4 flex items-center gap-6">
                        <img width="30" height="30" src="https://d2n6cmh8j179w8.cloudfront.net/9f5a9986-56bd-4cd9-9709-7cadd1f5c199/build/assets/deployments-light-1c77f0a9.png">
                        <span><span class="font-bold">Reliable</span> Reporting</span>
                    </div>
                    <div class="mt-4 flex items-center gap-6">
                        <img width="30" height="30" src="https://d2n6cmh8j179w8.cloudfront.net/9f5a9986-56bd-4cd9-9709-7cadd1f5c199/build/assets/deployments-light-1c77f0a9.png">
                        <span><span class="font-bold">51 - 100</span> Units</span>
                    </div>
                    <div class="mt-2 border-t border-[#DDD8FF]"></div>

                    <div class="mt-2">
                        <a href="/manager/login" class="inline-block px-14 py-4 rounded-md bg-cyan-600 border border-transparent text-white font-bold text-center">Get Started</a>
                    </div>
                </div>
            </div>
            <div class="flex flex-col justify-between backdrop-blur-md  rounded-lg p-10 w-full" style="background-image: linear-gradient(79.74deg, rgba(241, 238, 255, 0.9) 8.07%, rgba(241, 238, 255, 0) 100%);">
                <div>
                    <div class="flex items-center justify-between gap-20">
                        <div>
                            <div class="text-2xl font-bold">
                                Platinum Plan
                            </div>
                            <div>
                                <span class="text-[56px] font-bold">$35</span>
                                <span>/month</span>
                            </div>
                            <div class="mt-2">
                                Simple month-to-month pricing.
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="mt-2 flex items-center gap-6">
                        <img width="30" height="30" src="https://d2n6cmh8j179w8.cloudfront.net/9f5a9986-56bd-4cd9-9709-7cadd1f5c199/build/assets/deployments-light-1c77f0a9.png">
                        <span><span class="font-bold">Auto</span> Allocations</span>
                    </div>

                    <div class="mt-4 flex items-center gap-6">
                        <img width="30" height="30" src="https://d2n6cmh8j179w8.cloudfront.net/9f5a9986-56bd-4cd9-9709-7cadd1f5c199/build/assets/deployments-light-1c77f0a9.png">
                        <span><span class="font-bold">Instant</span> Payments</span>
                    </div>
                    <div class="mt-4 flex items-center gap-6">
                        <img width="30" height="30" src="https://d2n6cmh8j179w8.cloudfront.net/9f5a9986-56bd-4cd9-9709-7cadd1f5c199/build/assets/deployments-light-1c77f0a9.png">
                        <span><span class="font-bold">Reliable</span> Reporting</span>
                    </div>
                    <div class="mt-4 flex items-center gap-6">
                        <img width="30" height="30" src="https://d2n6cmh8j179w8.cloudfront.net/9f5a9986-56bd-4cd9-9709-7cadd1f5c199/build/assets/deployments-light-1c77f0a9.png">
                        <span><span class="font-bold">100 - 200</span> Units</span>
                    </div>
                    <div class="mt-2 border-t border-[#DDD8FF]"></div>

                    <div class="mt-2">
                        <a href="/manager/login" class="inline-block px-14 py-4 rounded-md bg-cyan-600 border border-transparent text-white font-bold text-center">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Links -->
    <footer class="mt-10 md:mt-10 lg:mt-22">
        <div class="relative  mx-auto grid max-w-7xl gap-12 px-6 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6">
            <div>
                <a href="/">
                    <img src="assets/header.png" style="margin-top:20px">
                    <span class="sr-only">Kodibooks</span>
                </a>
            </div>
            <div>
                <a href="#">
                    <img src="assets/saf.png">
                    <span class="sr-only">Safaricom</span>
                </a>
            </div>
            <div>
                <a href="/">
                    <img src="assets/at.png">
                    <span class="sr-only">Africas Talking</span>
                </a>
            </div>

            <div class="md:col-start-3 lg:col-start-5">
                <h4 class="font-bold">Partners</h4>
                <ul class="mt-4 space-y-1">
                    <li><a href="#">Safaricom</a></li>
                    <li><a href="#">Africastalking</a></li>
                </ul>
            </div>

            <!-- Legal Links -->
            <div class="md:col-start-4 lg:col-start-6">
                <h4 class="font-bold">Legal</h4>

                <ul class="mt-4 space-y-1">
                    <li><a href="/privacy">Privacy</a></li>
                    <li><a href="/terms">Terms of Service</a></li>
                </ul>
            </div>
        </div>
    </footer>

    <!-- Copyright -->
    <div class="mx-auto max-w-7xl px-6 pt-6 pb-12 text-center opacity-75">
        Copyright © Kodibooks - 2024
    </div>
<!-- 
    <script type="text/javascript">
        ! function(e, t, n) {
            function a() {
                var e = t.getElementsByTagName("script")[0],
                    n = t.createElement("script");
                n.type = "text/javascript", n.async = !0, n.src = "https://beacon-v2.helpscout.net", e.parentNode
                    .insertBefore(n, e)
            }
            if (e.Beacon = n = function(t, n, a) {
                    e.Beacon.readyQueue.push({
                        method: t,
                        options: n,
                        data: a
                    })
                }, n.readyQueue = [], "complete" === t.readyState) return a();
            e.attachEvent ? e.attachEvent("onload", a) : e.addEventListener("load", a, !1)
        }(window, document, window.Beacon || function() {});
    </script> -->
    <script type="text/javascript">
        window.Beacon('init', '88508242-7b51-46dc-80df-9a3633f4f2ca')
    </script>
</body>

</html>