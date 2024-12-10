@extends('default-page')

@section('title', 'Convertiverse - XLS to HTML Plus')
@section('content')
    <div class="content-wrapper">
        <div class="middle-content container">
            <h1>Convert Excel to HTML Table</h1>
            <p>Add your Excel data and convert it to HTML Table effortlessly. Upload a file and get the result right
                away.</p>

            <div class="background" id="uploadArea">
                <div class="conversion-options">
                    Convert to:
                    <button class="htmlConvertBtn active" onclick="onClickOutput(this, 'html')">
                        <svg class="w-6 h-6 text-gray-800" style="display: inline" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="m8 8-4 4 4 4m8 0 4-4-4-4m-2-3-4 14"/>
                        </svg>
                        HTML
                    </button>
                    <button class="jsonConvertBtn" onclick="onClickOutput(this, 'json')">{ } JSON</button>
                </div>

                <div id="uploadSection">
                    <div class="drop-zone" id="dropZone">
                        <img src="{{Vite::asset('resources/img/upload.png')}}" alt="Upload Icon"
                             class="upload-icon">
                        <p>Drag and drop your file here, or click to select a file</p>
                        <input type="file" id="fileInput" accept=".xls,.xlsx">
                    </div>
                </div>

                <div class="toggle-header" id="optionsContent">
                    Options
                    {{--<div>
                        <div class="input-group">
                            <label for="excelFormat">Excel Format</label>
                            <select id="excelFormat">
                                <option value="xlsx">XLSX</option>
                                <option value="xls">XLS</option>
                                <option value="csv">CSV</option>
                            </select>
                            <label for="sheetName">Sheet Name</label>
                            <input type="text" id="sheetName" placeholder="Enter sheet name">
                        </div>
                        <div class="input-group">
                            <label for="rowRange">Row Range</label>
                            <input type="text" id="rowRange" placeholder="e.g., 1-10" style="width: 100px;">
                            <span> (e.g., 1-10 for rows 1 to 10)</span>
                            <label for="colRange">Column Range</label>
                            <input type="text" id="colRange" placeholder="e.g., A-C" style="width: 100px;">
                            <span> (e.g., A-C for columns A to C)</span>
                        </div>
                    </div>--}}
                </div>

                <div id="file-list" style="display: none;">
                    <h3>Uploaded File: <span id="uploaded-file-name"></span></h3>
                </div>

                <div id="convert-button" class="convert-button" style="display: none;">
                    <button id="convertBtn">Convert</button>
                </div>
            </div>

            <div id="result" style="display: none;">
                <b>Result</b>
                <div id="result-content"></div>
            </div>

        </div>
        <div class="container flex justify-center">
            <div class="steps-container">
                <div class="step">
                    <div class="step-number">1</div>
                    <div class="step-title">Pick Your Excel File</div>
                    <div class="step-description">You can upload files from your computer or import from a URL.</div>
                </div>
                <div class="step">
                    <div class="step-number">2</div>
                    <div class="step-title">Preview and Configure</div>
                    <div class="step-description">Preview your file and configure the conversion options if needed.
                    </div>
                </div>
                <div class="step">
                    <div class="step-number">3</div>
                    <div class="step-title">Convert and Download</div>
                    <div class="step-description">Click "Convert" to transform your file into an HTML Table and download
                        it
                        instantly.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @vite('resources/js/page/main.js')
@endsection
