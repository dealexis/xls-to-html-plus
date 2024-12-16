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
                        <img src="{{Vite::asset('resources/images/upload.png')}}" alt="Upload Icon"
                             class="upload-icon">
                        <p>Drag and drop your file here, or click to select a file</p>
                        <input type="file" id="fileInput" accept=".xls,.xlsx">
                    </div>
                </div>
                <div class="toggle-header" id="optionsContent">
                    Options
                </div>
                <div class="options-content" style="display: none;">
                    <div class="input-group columns-list">
                        <label>
                            Choose specific columns that will appear in the result
                        </label>
                        <ul>
                            <li><label><input type="checkbox" name="columns[]" value="A"> A</label></li>
                            <li><label><input type="checkbox" name="columns[]" value="B"> B</label></li>
                            <li><label><input type="checkbox" name="columns[]" value="C"> C</label></li>
                            <li><label><input type="checkbox" name="columns[]" value="D"> D</label></li>
                            <li><label><input type="checkbox" name="columns[]" value="E"> E</label></li>
                            <li><label><input type="checkbox" name="columns[]" value="F"> F</label></li>
                            <li><label><input type="checkbox" name="columns[]" value="G"> G</label></li>
                            <li><label><input type="checkbox" name="columns[]" value="H"> H</label></li>
                            <li><label><input type="checkbox" name="columns[]" value="I"> I</label></li>
                            <li><label><input type="checkbox" name="columns[]" value="J"> J</label></li>
                            <li><label><input type="checkbox" name="columns[]" value="K"> K</label></li>
                            <li><label><input type="checkbox" name="columns[]" value="L"> L</label></li>
                            <li><label><input type="checkbox" name="columns[]" value="M"> M</label></li>
                            <li><label><input type="checkbox" name="columns[]" value="N"> N</label></li>
                            {{--                                <li><label><input type="checkbox" name="columns[]" value="O"> O</label></li>--}}
                            {{--                                <li><label><input type="checkbox" name="columns[]" value="P"> P</label></li>--}}
                            {{--                                <li><label><input type="checkbox" name="columns[]" value="Q"> Q</label></li>--}}
                            {{--                                <li><label><input type="checkbox" name="columns[]" value="R"> R</label></li>--}}
                            {{--                                <li><label><input type="checkbox" name="columns[]" value="S"> S</label></li>--}}
                            {{--                                <li><label><input type="checkbox" name="columns[]" value="T"> T</label></li>--}}
                            {{--                                <li><label><input type="checkbox" name="columns[]" value="U"> U</label></li>--}}
                            {{--                                <li><label><input type="checkbox" name="columns[]" value="V"> V</label></li>--}}
                            {{--                                <li><label><input type="checkbox" name="columns[]" value="W"> W</label></li>--}}
                            {{--                                <li><label><input type="checkbox" name="columns[]" value="X"> X</label></li>--}}
                            {{--                                <li><label><input type="checkbox" name="columns[]" value="Y"> Y</label></li>--}}
                            {{--                                <li><label><input type="checkbox" name="columns[]" value="Z"> Z</label></li>--}}
                        </ul>
                    </div>
                    <div class="input-group">
                        <label>
                            <input type="checkbox" value="1" name="f_header_row">
                            Make key:value pairs using first row as a header (json)
                        </label>
                    </div>
                    <div class="input-group input-group--children">
                        <label>
                            <input type="checkbox" value="1" name="f_header_row_wr">
                            - Replace whitespace with _ symbol (json)
                        </label>
                    </div>
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
                    <div class="step-description">Upload files from your device</div>
                </div>
                <div class="step">
                    <div class="step-number">2</div>
                    <div class="step-title">Configure if needed</div>
                    <div class="step-description">Preview your file and configure the conversion options if needed</div>
                </div>
                <div class="step">
                    <div class="step-number">3</div>
                    <div class="step-title">Convert and Download</div>
                    <div class="step-description">Click "Convert" to transform your file into an HTML Table or JSON and
                        download it instantly
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @vite('resources/js/page/main.js')
@endsection
