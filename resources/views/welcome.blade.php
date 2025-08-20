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
    </script>
</body>

</html>
