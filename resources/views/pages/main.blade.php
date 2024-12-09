@extends('default-page')

@section('title', 'Convertiverse - XLS to HTML Plus')
@section('content')
    <div class="middle-content container">
        <h1>Convert Excel to HTML Table</h1>
        <p>Add your Excel data and convert it to HTML Table effortlessly. Upload a file and get the result right away.</p>

        <div class="background" id="movingBackground">
            <!-- probably toggle -->
            <div class="conversion-options">
                <button id="htmlConvertBtn" class="active">Convert to HTML</button>
                <button id="jsonConvertBtn">Convert to JSON</button>
            </div>

            <!-- Drag-and-drop file -->
            <div style="display: flex; flex-direction: row; align-items: center; justify-content: center;"
                 id="uploadSection">
                <div class="drop-zone" id="dropZone">
                    <img src="https://img.icons8.com/ios-glyphs/50/000000/upload.png" alt="Upload Icon"
                         class="upload-icon">
                    <p>Drag and drop your file here, or click to select a file</p>
                    <input type="file" id="fileInput">
                </div>
            </div>

            <!-- input URL box -->
            <input type="text" id="urlInputBox" class="link-input-box" placeholder="https://example.com/data...">

            <!-- Slide Toggle Options -->
            <div class="toggle-header" onclick="toggleOptions()">
                Options
            </div>
            <div id="optionsContent">
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
            </div>

            <!-- Convert button inside background -->
            <div class="convert-button">
                <button id="convertBtn">Convert</button>
            </div>
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
                <div class="step-description">Preview your file and configure the conversion options if needed.</div>
            </div>
            <div class="step">
                <div class="step-number">3</div>
                <div class="step-title">Convert and Download</div>
                <div class="step-description">Click "Convert" to transform your file into an HTML Table and download it
                    instantly.
                </div>
            </div>
        </div>
    </div>
@endsection
