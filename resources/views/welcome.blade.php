<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    {{-- 1 --}}
    <button onclick="changeBackground()">Change background to red</button>
    <hr>
    {{-- 2 --}}
    <div>
        <input type="text" id="textInput">
        <button onclick="changeText()">Display text inside Tag</button>
        <p id="output"></p>
    </div>
    <hr>
    {{-- 3 --}}
    <div id="hidden"></div>
    <button onclick="showHiddenValue()">Show Hidden Value</button>
    <hr>
    {{-- 4 --}}
    <div id="visible">
        <p>This is a visible paragraph.</p>
    </div>
    <button onclick="hideVisibleValue()">This button hides the visible text</button>
    <hr>
    {{-- 5 --}}
    <div id="toggle">
        <p>toggle show/hide text</p>
    </div>
    <button onclick="toggleText()">Toggle text</button>
    <hr>
    {{-- 6 --}}
    <ul>
        <li id="list">
        </li>
    </ul>
    <button onclick="addListItem()">Add Item to List</button>
    <hr>

    {{-- 7 --}}
    <button onclick="removeLastItem()">Remove last item from list</button>
    <hr>

    {{-- 8 --}}
    <h1 id="text">H1 TEXT</h1>
    <button onclick="changeH1Text()">Change H1 Text</button>
    <hr>

    {{-- 9 --}}
    <input type="text" id="textInput2">
    <button onclick="alertInputValue()">Alert Input Value</button>
    <hr>
    {{-- 10 --}}
    <input type="checkbox" id="select-all" onclick="selectAllCheckboxes()">Select all</input><br>
    <input type="checkbox" class="checkbox">CheckBox1</input><br>
    <input type="checkbox" class="checkbox">CheckBox2</input><br>
    <input type="checkbox" class="checkbox">CheckBox3</input><br>
    <hr>
    {{-- 11 --}}

    {{-- 12 --}}
    <label for="stopwatch">Stop Watch</label><br>
    <label for="stopwatch-count">00.00</label><br>
    <button onclick="startStopWatch()">Start</button>
    <button onclick="stopStopWatch()">Stop</button>
    <button onclick="resetStopWatch()">Reset</button>
    <hr>

    {{-- 13 --}}
    <label for="reverse-timer">Reverse Timer</label><br>
    <label for="reverse-timer-count">59.00</label><br>
    <button onclick="startReverseTimer()">Start</button>
    <button onclick="stopReverseTimer()">Stop</button>
    <button onclick="resetReverseTimer()">Reset</button>

    {{-- 14 --}}
    {{-- Take a description box and below that show the word count in red color. When the word count turns 100 make it green color. Like (15 words) and at 100 and greater (100 words) --}}
    <textarea id="description" oninput="updateWordCount()"></textarea>
    <p id="word-count" style="color: red;">0 words</p>

    <script>
        // 1
        function changeBackground() {
            document.body.style.backgroundColor = 'red';
        }

        // 2
        function changeText() {
            let inputValue = document.getElementById("textInput").value;
            document.getElementById("output").innerText = inputValue;
        }

        // 3
        function showHiddenValue() {
            let hiddenDiv = document.getElementById("hidden");
            hiddenDiv.innerText = "This is a hidden value";
        }

        // 4
        function hideVisibleValue() {
            let visibleDiv = document.getElementById("visible");
            visibleDiv.style.display = 'none';
        }

        // 5
        function toggleText() {
            let toggleDiv = document.getElementById("toggle");
            if (toggleDiv.style.display === 'none') {
                toggleDiv.style.display = 'block';
            } else {
                toggleDiv.style.display = 'none';
            }
        }

        // 6
        function addListItem() {
            let list = document.getElementById("list");
            let newItem = document.createElement("li");
            newItem.innerText = "list " + (list.children.length + 1);
            list.appendChild(newItem);
        }

        // 7
        function removeLastItem() {
            let lastItem = document.getElementById("list");
            if (lastItem.children.length > 0) {
                lastItem.removeChild(lastItem.lastChild);
            }
        }

        // 8
        function changeH1Text() {
            let h1 = document.getElementById("text");
            h1.innerText = "New H1 Text";
            h1.style.color = "blue";
        }

        // 9
        function alertInputValue() {
            let inputValue = document.getElementById("textInput2").value;
            if (inputValue) {
                alert(inputValue);
            } else {
                alert('Please enter something');
            }
        }

        //10
        function selectAllCheckboxes() {
            let selectAll = document.getElementById("select-all");
            let checkboxes = document.getElementsByClassName("checkbox");
            for (let checkbox of checkboxes) {
                checkbox.checked = selectAll.checked;
            }
        }

        // 11

        // 12
        let interval = null;
        let startTime = 0;
        let elapsed = 0;

        function startStopWatch() {
            if (interval) return; // prevent multiple intervals
            startTime = Date.now() - elapsed;
            interval = setInterval(() => {
                elapsed = Date.now() - startTime;
                document.querySelector('label[for="stopwatch-count"]').textContent = (elapsed / 1000).toFixed(2);
            }, 100);
        }

        function stopStopWatch() {
            clearInterval(interval);
            interval = null;
        }

        function resetStopWatch() {
            clearInterval(interval);
            interval = null;
            elapsed = 0;
            document.querySelector('label[for="stopwatch-count"]').textContent = "00.00";
        }

        // 13
        let reverseInterval = null;
        let reverseStartTime = 0;
        let reverseRemaining = 59000;

        function startReverseTimer() {
            if (reverseInterval) return;
            reverseEndTime = Date.now() + reverseRemaining;
            reverseInterval = setInterval(() => {
                reverseRemaining = reverseEndTime - Date.now();
                if (reverseRemaining <= 0) {
                    reverseRemaining = 0;
                    clearInterval(reverseInterval);
                    reverseInterval = null;
                }
                document.querySelector('label[for="reverse-timer-count"]').textContent =
                    (reverseRemaining / 1000).toFixed(2);
            }, 100);
        }

        function stopReverseTimer() {
            clearInterval(reverseInterval);
            reverseInterval = null;
        }

        function resetReverseTimer() {
            clearInterval(reverseInterval);
            reverseInterval = null;
            reverseRemaining = 59000;
            document.querySelector('label[for="reverse-timer-count"]').textContent = "59.00";
        }

        // 14
        function updateWordCount() {
            let text = document.getElementById("description").value;
            let wordCount = text.split(/\s+/).filter(function(word) {
                return word.length > 0;
            }).length;
            let wordCountDisplay = document.getElementById("word-count");
            wordCountDisplay.textContent = wordCount + " words";
            wordCountDisplay.style.color = wordCount >= 100 ? "green" : "red";
        }
    </script>
</body>

</html>
