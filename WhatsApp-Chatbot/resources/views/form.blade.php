<div id="login-container">
    <a href="/login-Page">
        <button id="login">Login</button>
    </a>
</div>
<blbr>
    <form id="form-data" action="Send-Messages" method="post">
        @csrf
        <input type="number" name="WhatsApp" class="whatsapp" placeholder="Enter the WhatsApp Number" pattern="[0-9]*" maxlength="10" required>
        <br><br>
        <input type="text" name="fname" class="whatsapp" placeholder="Enter Your Name" required><br>
        <input type="text" name="item1" class="whatsapp" placeholder="Item 1" required><br>
        <input type="text" name="item2" class="whatsapp" placeholder="Item 2" required><br>
        <!-- <textarea name="message" id="" rows="20" placeholder="Type Messages" required></textarea> -->
        <br><br>
        <input type="submit" value="Submit" id="submits">
    </form>

    <style>
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        #form-data {
            height: 100vh;
            width: 98vw;
            background-color: #d0d0d07a;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        #form-container {
            height: 100%;
            width: 100%;
            /* background-color: yellow; */
        }

        .whatsapp {
            height: 8%;
            width: 50%;
            border: none;
            border-radius: 10px;
            font-size: 1.5rem;

            &::placeholder {
                color: #3a3a3aad;
                font-size: 1rem;
            }

            &:focus {
                color: black;
                /* font-size: 1.5rem; */
                outline: none;
            }
        }

        #form-data textarea {
            width: 50%;
            border-radius: 10px;
            font-size: 1rem;

            &::placeholder {
                color: #3a3a3aad;
                font-size: 1rem;
            }

            &:focus {
                color: black;
                font-size: 1rem;
                outline: none;
            }
        }

        #submits {
            height: 7%;
            width: 7%;
            background-color: #2aa81a;
            color: white;
            font-weight: 200;
            font-size: 1.5rem;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            border-radius: 10px;
            border: none;
            transition-duration: 0.5s;

            &:hover {
                cursor: pointer;
                background-color: white;
                color: green;
                border: 0.5px solid green;
            }
        }

        #login {
            height: 7%;
            width: 7%;
            background-color: #f9e601;
            color: white;
            font-weight: 200;
            font-size: 1.5rem;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            border-radius: 10px;
            border: none;
            position: relative;
            left: 93%;
            transition-duration: 0.5s;

            &:hover {
                background-color: black;
                color: whitesmoke;
                cursor: pointer;
            }
        }
    </style>