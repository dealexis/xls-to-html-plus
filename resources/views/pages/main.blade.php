@extends('default-page')

@section('title', 'Convertiverse - XLS to HTML Plus')
@section('content')
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
            <div id="file-list" style="display: none;">
                <h3><span id="uploaded-file-name"></span>
                    <span class="toggle-header" id="optionsContent" style="display: inline;">
                            <svg style="display: inline;" fill="#000000" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                 width="20" height="20" viewBox="0 0 569.613 569.614"
                                 xml:space="preserve">
                            <g>
                                <g>
                                    <path d="M371.49,563.638l113.052-65.854c5.26-3.063,9.088-8.094,10.64-13.975c1.555-5.888,0.701-12.148-2.359-17.405
                                        l-30.769-52.807c4.789-6.524,9.083-13.115,12.972-19.918c3.893-6.799,7.405-13.84,10.606-21.275l61.114-0.221
                                        c6.086-0.021,11.915-2.464,16.202-6.781c4.287-4.32,6.687-10.165,6.665-16.255l-0.48-130.833
                                        c-0.024-6.089-2.464-11.919-6.784-16.206c-4.299-4.269-10.113-6.662-16.166-6.662c-0.03,0-0.062,0-0.089,0l-61.182,0.242
                                        c-6.444-14.462-14.428-28.14-23.871-40.913l30.417-53.143c6.294-11.001,2.481-25.025-8.52-31.316L369.403,5.335
                                        c-5.281-3.023-11.545-3.822-17.424-2.231c-5.872,1.598-10.872,5.462-13.892,10.747L307.665,67
                                        c-15.766-1.662-31.653-1.613-47.363,0.144l-30.796-52.892c-3.063-5.263-8.094-9.091-13.975-10.646
                                        c-5.884-1.551-12.148-0.704-17.408,2.359L85.068,71.823c-10.949,6.38-14.657,20.429-8.28,31.38l30.765,52.831
                                        c-4.761,6.484-9.048,13.076-12.953,19.899c-3.904,6.824-7.417,13.855-10.6,21.255l-61.139,0.235
                                        C10.187,197.472-0.046,207.785,0,220.456L0.48,351.29c0.024,6.086,2.463,11.919,6.784,16.206
                                        c4.299,4.269,10.11,6.661,16.166,6.661c0.028,0,0.058,0,0.086,0l61.203-0.229c6.432,14.452,14.413,28.131,23.868,40.915
                                        l-30.413,53.141c-3.023,5.284-3.825,11.548-2.231,17.423c1.597,5.872,5.462,10.872,10.747,13.896l113.535,64.977
                                        c3.596,2.056,7.513,3.032,11.38,3.032c7.962,0,15.701-4.146,19.942-11.552l30.417-53.149c15.799,1.671,31.684,1.619,47.348-0.144
                                        l30.799,52.89c3.066,5.26,8.094,9.088,13.978,10.643C359.967,567.552,366.23,566.705,371.49,563.638z M341.129,465.911
                                        c-4.902-8.418-14.599-12.815-24.137-10.994c-20.588,3.935-42.174,3.999-63.128,0.202c-9.572-1.735-19.184,2.741-24.015,11.181
                                        l-26.748,46.745l-73.694-42.18l26.75-46.741c4.832-8.439,3.819-19.006-2.521-26.371c-13.978-16.239-24.685-34.594-31.818-54.554
                                        c-3.265-9.131-11.918-15.227-21.61-15.227c-0.027,0-0.058,0-0.085,0l-53.825,0.199l-0.315-84.937l53.819-0.205
                                        c9.722-0.04,18.366-6.197,21.576-15.374c3.69-10.557,7.962-20.019,13.06-28.917c5.101-8.914,11.089-17.387,18.311-25.897
                                        c6.294-7.417,7.225-17.993,2.334-26.396l-27.081-46.509l73.385-42.754l27.078,46.497c4.893,8.4,14.544,12.821,24.095,11.004
                                        c20.716-3.911,42.317-3.978,63.189-0.19c9.557,1.753,19.189-2.742,24.019-11.178l26.753-46.744l73.697,42.179l-26.753,46.742
                                        c-4.826,8.437-3.816,19,2.521,26.368c13.956,16.221,24.669,34.587,31.842,54.59c3.271,9.119,11.919,15.202,21.604,15.202
                                        c0.031,0,0.062,0,0.092,0l53.789-0.214l0.315,84.927l-53.783,0.192c-9.712,0.037-18.351,6.182-21.569,15.347
                                        c-3.746,10.654-8.023,20.131-13.082,28.975c-5.064,8.847-11.067,17.338-18.356,25.958c-6.271,7.418-7.194,17.978-2.305,26.368
                                        l27.078,46.472l-73.391,42.749L341.129,465.911z"/>
                                    <path d="M392.531,346.458c16.472-28.773,20.746-62.24,12.047-94.232s-29.342-58.685-58.115-75.151
                                        c-18.761-10.74-40.05-16.417-61.562-16.417c-44.446,0-85.762,23.944-107.822,62.485c-33.994,59.404-13.327,135.39,46.071,169.386
                                        c18.764,10.737,40.052,16.411,61.564,16.411C329.158,408.943,370.475,385.001,392.531,346.458z M352.696,323.658
                                        c-13.902,24.293-39.955,39.385-67.985,39.385c-13.528,0-26.934-3.58-38.764-10.349c-37.433-21.426-50.456-69.312-29.033-106.751
                                        c13.905-24.291,39.958-39.385,67.987-39.385c13.528,0,26.932,3.58,38.762,10.355c18.136,10.379,31.142,27.197,36.628,47.359
                                        C365.771,284.435,363.075,305.524,352.696,323.658z"/>
                                </g>
                            </g>
                            </svg>
                        </span>
                </h3>
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
                        <li><label><input type="checkbox" name="columns[]" value="O"> O</label></li>
                        <li><label><input type="checkbox" name="columns[]" value="P"> P</label></li>
                        <li><label><input type="checkbox" name="columns[]" value="Q"> Q</label></li>
                        <li><label><input type="checkbox" name="columns[]" value="R"> R</label></li>
                        <li><label><input type="checkbox" name="columns[]" value="S"> S</label></li>
                        <li><label><input type="checkbox" name="columns[]" value="T"> T</label></li>
                        <li><label><input type="checkbox" name="columns[]" value="U"> U</label></li>
                        <li><label><input type="checkbox" name="columns[]" value="V"> V</label></li>
                        <li><label><input type="checkbox" name="columns[]" value="W"> W</label></li>
                        <li><label><input type="checkbox" name="columns[]" value="X"> X</label></li>
                        <li><label><input type="checkbox" name="columns[]" value="Y"> Y</label></li>
                        <li><label><input type="checkbox" name="columns[]" value="Z"> Z</label></li>
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
            <div id="convert-button" class="convert-button" style="display: none;">
                <button id="convertBtn">Convert</button>
            </div>
        </div>
        <div id="result" class="full-width" style="display: none;">
            <div class="full-width">
                <div id="copy-button" class="convert-button">
                    <button id="copyBtn" data-clipboard-target="#result-content">
                        Copy
                    </button>
                </div>
                <textarea id="result-content" readonly
                          style="opacity: 0; height: 0; width: 0; position:absolute;"></textarea>
                <pre><code class="language-html"></code></pre>
            </div>
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
@endsection

@section('scripts')
    @vite('resources/js/page/main.js')
@endsection
