<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #0f0f0f, #1c1c1c);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Contact Form Container */
        .contact-container {
            background: rgba(30, 30, 30, 0.95);
            color: #FFFFFF;
            max-width: 420px;
            width: 100%;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.5);
            animation: fadeIn 1s ease-in-out;
            backdrop-filter: blur(10px);
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Heading */
        .contact-container h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            color: #FFD700;
            font-weight: bold;
            text-transform: uppercase;
        }

        /* Form Group */
        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
            color: #BBBBBB;
            font-weight: 500;
        }

        .form-group input,
        .form-group textarea {
            width: 93%;
            padding: 14px;
            background: #2C2C2C;
            border: 1px solid #444;
            border-radius: 8px;
            font-size: 16px;
            color: #FFFFFF;
            transition: 0.3s;
            outline: none;
            box-shadow: 0 0 10px rgba(255, 215, 0, 0.1);
            
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #FFD700;
            box-shadow: 0 0 12px rgba(255, 215, 0, 0.6);
        }

        /* Gender Styling */
        .gender-group {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        .gender-group label {
            flex: 1;
            text-align: center;
            background: #2C2C2C;
            padding: 12px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            border: 1px solid #444;
        }

        .gender-group input {
            display: none;
        }

        .gender-group input:checked + label {
            background: linear-gradient(90deg, #FFD700, #FFA500);
            color: #121212;
            border-color: #FFD700;
        }

        /* Hobbies Styling */
        .hobbies-group {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .hobbies-group label {
            display: flex;
            align-items: center;
            gap: 8px;
            background: #2C2C2C;
            padding: 10px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            border: 1px solid #444;
            transition: all 0.3s ease-in-out;
        }

        .hobbies-group input {
            display: none;
        }

        .hobbies-group input:checked + label {
            background: linear-gradient(90deg, #FFD700, #FFA500);
            color: #121212;
            border-color: #FFD700;
        }

        /* City Dropdown */
        #city {
            width: 100%;
            padding: 14px;
            background: #2C2C2C;
            border: 1px solid #444;
            border-radius: 8px;
            font-size: 16px;
            color: #FFFFFF;
            transition: 0.3s;
            outline: none;
            box-shadow: 0 0 10px rgba(255, 215, 0, 0.1);
            appearance: none; /* Removes default dropdown styling */
            cursor: pointer;
        }

        /* When focused */
        #city:focus {
            border-color: #FFD700;
            box-shadow: 0 0 12px rgba(255, 215, 0, 0.6);
        }

        /* Dropdown arrow customization */
        #city::-ms-expand {
            display: none; /* Hides default arrow in IE */
        }

        /* Styling the dropdown options */
        #city option {
            background: #2C2C2C;
            color: #FFFFFF;
            padding: 10px;
            font-size: 16px;
        }

        /* Change appearance when hovering over options */
        #city option:hover {
            background: #FFD700;
            color: #121212;
        }


        /* Submit Button */
        .submit-btn {
            display: block;
            width: 100%;
            background: linear-gradient(90deg, #FFD700, #FFA500);
            color: #121212;
            border: none;
            padding: 14px;
            font-size: 18px;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            text-transform: uppercase;
        }

        .submit-btn:hover {
            background: linear-gradient(90deg, #FFA500, #FFD700);
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(255, 215, 0, 0.4);
        }

        /* Responsive */
        @media (max-width: 480px) {
            .contact-container {
                padding: 25px;
            }

            .contact-container h1 {
                font-size: 20px;
            }

            .form-group input,
            .form-group textarea {
                font-size: 14px;
            }

            .submit-btn {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="contact-container">
        <h1>Contact Us</h1>
        <form method="POST" action="{{ route('dataCreate') }}"  enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $editRecord->id ?? '' }}">

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ $editRecord->name ?? '' }}" required>
            </div>

            <div class="form-group">
                <label for="surname">Surname</label>
                <input type="text" id="surname" name="surname" value="{{ $editRecord->surname ?? '' }}" required>
            </div>

          
            <div class="form-group">
                <label>Gender:</label>
                <div class="gender-group">
                <input type="radio" id="male" name="gender" value="male" 
                    {{ (isset($editRecord) && $editRecord->gender == 'male') ? 'checked' : '' }} required>
                <label for="male">Male</label>

                <input type="radio" id="female" name="gender" value="female" 
                    {{ (isset($editRecord) && $editRecord->gender == 'female') ? 'checked' : '' }} required>
                <label for="female">Female</label>

                </div>
            </div>

            <div class="form-group">
                <label>Hobbies:</label>
                <div class="hobbies-group">
                    <input type="checkbox" id="reading" name="hobbies[]" value="Reading"
                        {{ (isset($editRecord) && in_array('Reading', $editRecord->hobbies)) ? 'checked' : '' }}>
                    <label for="reading">Reading</label>

                    <input type="checkbox" id="gaming" name="hobbies[]" value="Gaming"
                        {{ (isset($editRecord) && in_array('Gaming', $editRecord->hobbies)) ? 'checked' : '' }}>
                    <label for="gaming">Gaming</label>

                    <input type="checkbox" id="sport" name="hobbies[]" value="Sport"
                        {{ (isset($editRecord) && in_array('Sport', $editRecord->hobbies)) ? 'checked' : '' }}>
                    <label for="sport">Sport</label>
                </div>
            </div>

            <div class="form-group">
                <label for="city">City</label>
                <select id="city" name="city" required>
                    <option value="">Select City</option>
                    @foreach($cities as $city)
                        <option value="{{ $city }}" {{ (isset($editRecord) && $editRecord->city == $city) ? 'selected' : '' }}>{{ $city }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="File">File</label>
                <input type="file" name="file" >
            </div>

            <button type="submit" class="submit-btn">Submit</button>
        </form>
    </div>
</body>
</html>