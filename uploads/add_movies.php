    <form class="bg-light" id="uploadForm" action="upload_movies.php" method="POST" enctype="multipart/form-data">
        <!-- px-md-5 -->
        <div class="form-container bg-white rounded-3 px-0 pb-5">
            <h4 class="text-center w-100 py-4 rounded-bottom text-primary mb-5"><i class="fas fa-film me-1"></i> Movies Registration</h4>

            <!-- Movie Names -->
            <div class="form-row row mt-3 ">
                <div class="form-group col-md-6 ">
                    <h6 for="name_film" class="purple"><i class="fa-solid fa-signature"></i> Movie name in english</h6>
                    <input type="text" class="form-control py-2 rounded-3 mt-1" id="name_film" name="name_film" placeholder="Movie name in english">
                </div>
                <div class="form-group col-md-6">
                    <h6 for="name_film_ku" class="purple"><i class="fa-solid fa-signature"></i> Movie name in kurdish</h6>
                    <input type="text" class="form-control py-2 rounded-3 mt-1" id="name_film_ku" name="name_film_ku" placeholder="Movie name in kurdish">
                </div>
            </div>

            <!-- Synopsis -->
            <div class="form-group mt-3">
                <h6 for="synopsis " class="purple flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-body-text" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M0 .5A.5.5 0 0 1 .5 0h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 0 .5m0 2A.5.5 0 0 1 .5 2h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m9 0a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m-9 2A.5.5 0 0 1 .5 4h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m5 0a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m7 0a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m-12 2A.5.5 0 0 1 .5 6h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5m8 0a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m-8 2A.5.5 0 0 1 .5 8h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m7 0a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-7 2a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5" />
                    </svg> Short Summary (Synopsis)
                </h6>
                <textarea class="form-control  py-2 rounded-3 mt-1" placeholder="Write a synopsis" id="synopsis" name="synopsis" rows="3"></textarea>
            </div>

            <!-- Genres -->
            <div class="form-row row mt-3">
                <div class="form-group col-md-4">
                    <h6 for="genre" class="purple flex items-center gap-1"> <img width="25px" src="https://cdn-icons-png.flaticon.com/512/10655/10655835.png" alt="">
                        Genre</h6>
                    <select class="form-control py-2 rounded-3 mt-1" id="genre" name="genre1">
                        <option value="" selected disabled>-- Genre --</option>
                        <option value="null">None</option>
                        <option value="Drama">Drama</option>
                        <option value="Action">Action</option>
                        <option value="Comedy">Comedy</option>
                        <option value="Adventure">Adventure</option>
                        <option value="Animation">Animation</option>
                        <option value="Biography">Biography</option>
                        <option value="Thriller">Thriller</option>
                        <option value="Survival">Survival</option>
                        <option value="Social Criticism">Social Criticism</option>
                        <option value="Crime">Crime</option>
                        <option value="Documentary">Documentary</option>
                        <option value="Family">Family</option>
                        <option value="Fantasy">Fantasy</option>
                        <option value="History">History</option>
                        <option value="Horror">Horror</option>
                        <option value="Music">Music</option>
                        <option value="Musical">Musical</option>
                        <option value="Mystery">Mystery</option>
                        <option value="Romance">Romance</option>
                        <option value="Sci-Fi">Science Fiction</option>
                        <option value="Sport">Sport</option>
                        <option value="Thriller">Thriller</option>
                        <option value="War">War</option>
                        <option value="Western">Western</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <h6 for="genre2" class="purple flex items-center gap-1"> <img width="25px" src="https://cdn-icons-png.flaticon.com/512/10655/10655835.png" alt="">
                        Genre(optional)</h6>
                    <select class="form-control py-2 rounded-3 mt-1" id="genre2" name="genre2[]">
                        <option value="" selected disabled>-- Genre --</option>
                        <option value="null">None</option>
                        <option value="Drama">Drama</option>
                        <option value="Action">Action</option>
                        <option value="Comedy">Comedy</option>
                        <option value="Adventure">Adventure</option>
                        <option value="Animation">Animation</option>
                        <option value="Biography">Biography</option>
                        <option value="Thriller">Thriller</option>
                        <option value="Survival">Survival</option>
                        <option value="Social Criticism">Social Criticism</option>
                        <option value="Crime">Crime</option>
                        <option value="Documentary">Documentary</option>
                        <option value="Family">Family</option>
                        <option value="Fantasy">Fantasy</option>
                        <option value="History">History</option>
                        <option value="Horror">Horror</option>
                        <option value="Music">Music</option>
                        <option value="Musical">Musical</option>
                        <option value="Mystery">Mystery</option>
                        <option value="Romance">Romance</option>
                        <option value="Sci-Fi">Science Fiction</option>
                        <option value="Sport">Sport</option>
                        <option value="Thriller">Thriller</option>
                        <option value="War">War</option>
                        <option value="Western">Western</option>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <h6 for="genre3" class="purple flex items-center gap-1">
                        <img width="25px" src="https://cdn-icons-png.flaticon.com/512/10655/10655835.png" alt="">
                        Genre(optional)
                    </h6>
                    <select class="form-control py-2 rounded-3 mt-1" id="genre3" name="genre3[]">
                        <option value="" selected disabled>-- Genre --</option>
                        <option value="null">None</option>
                        <option value="Drama">Drama</option>
                        <option value="Action">Action</option>
                        <option value="Comedy">Comedy</option>
                        <option value="Adventure">Adventure</option>
                        <option value="Animation">Animation</option>
                        <option value="Biography">Biography</option>
                        <option value="Thriller">Thriller</option>
                        <option value="Survival">Survival</option>
                        <option value="Social Criticism">Social Criticism</option>
                        <option value="Crime">Crime</option>
                        <option value="Documentary">Documentary</option>
                        <option value="Family">Family</option>
                        <option value="Fantasy">Fantasy</option>
                        <option value="History">History</option>
                        <option value="Horror">Horror</option>
                        <option value="Music">Music</option>
                        <option value="Musical">Musical</option>
                        <option value="Mystery">Mystery</option>
                        <option value="Romance">Romance</option>
                        <option value="Sci-Fi">Science Fiction</option>
                        <option value="Sport">Sport</option>
                        <option value="Thriller">Thriller</option>
                        <option value="War">War</option>
                        <option value="Western">Western</option>
                    </select>
                </div>
            </div>
            <div class="form-row row mt-3">
                <!-- Movie Type -->
                <div class="form-group col-md-6 mt-0">
                    <h6 for="movie_type"><i class="fa-brands fa-squarespace"></i> Movie type</h6>
                    <select class="form-control py-2 rounded-3 mt-1" id="movie_type" name="movie_type">
                        <option value="" disabled selected>-- Select a Type --</option>
                        <option value="null">None</option>
                        <option value="Movie">Movie</option>
                        <option value="Drama">Drama</option>
                        <option value="Movie Season">Movie Season</option>
                        <option value="Animated">Animated</option>
                        <option value="Carton">Carton</option>
                        <option value="Short Film">Short Film</option>
                        <option value="Documentary">Documentary</option>
                        <option value="TV Movie">TV Movie</option>
                        <option value="Music Video">Music Video</option>
                        <option value="Theatrical Film">Theatrical Film</option>
                        <option value="Religious">Religious</option>
                        <option value="Religious Season">Religious Season</option>
                        <optgroup label="Series" data-icon="🎬">
                            <option value="Movie Series">Movie Series</option>
                            <option value="Drama Series">Drama Series</option>
                            <option value="Animated Series">Animated Series</option>
                            <option value="Carton Series">Carton Series</option>
                            <option value="TV Series">TV Series</option>
                            <option value="Web Series">Web Series</option>
                            <option value="Religious Series">Religious Series</option>
                        </optgroup>
                    </select>
                    <script>
                        document.querySelectorAll('select#movie_type optgroup').forEach(optgroup => {
                            const icon = optgroup.getAttribute('data-icon') || '';
                            if (icon) {
                                const label = optgroup.getAttribute('label');
                                optgroup.setAttribute('label', `${icon} ${label}`);
                            }
                        });
                    </script>


                </div>
                <div class="form-group col-md-6">
                    <h6 for="Producing_country"><i class="fa-solid fa-flag-usa"></i> Producing country</h6>
                    <select class="form-control py-2 rounded-3 mt-1" id="Producing_country" name="Producing_country">
                        <option value="" selected disabled>-- Select --</option>
                        <option value="null">None</option>
                        <option value="Kurdistan">Kurdistan</option>
                        <option value="USA">USA</option>
                        <option value="Afghanistan">Afghanistan</option>
                        <option value="Albania">Albania</option>
                        <option value="Algeria">Algeria</option>
                        <option value="Andorra">Andorra</option>
                        <option value="Angola">Angola</option>
                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Armenia">Armenia</option>
                        <option value="Australia">Australia</option>
                        <option value="Austria">Austria</option>
                        <option value="Azerbaijan">Azerbaijan</option>
                        <option value="Bahamas">Bahamas</option>
                        <option value="Bahrain">Bahrain</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="Barbados">Barbados</option>
                        <option value="Belarus">Belarus</option>
                        <option value="Belgium">Belgium</option>
                        <option value="Belize">Belize</option>
                        <option value="Benin">Benin</option>
                        <option value="Bhutan">Bhutan</option>
                        <option value="Bolivia">Bolivia</option>
                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                        <option value="Botswana">Botswana</option>
                        <option value="Brazil">Brazil</option>
                        <option value="Brunei">Brunei</option>
                        <option value="Bulgaria">Bulgaria</option>
                        <option value="Burkina Faso">Burkina Faso</option>
                        <option value="Burundi">Burundi</option>
                        <option value="Cabo Verde">Cabo Verde</option>
                        <option value="Cambodia">Cambodia</option>
                        <option value="Cameroon">Cameroon</option>
                        <option value="Canada">Canada</option>
                        <option value="Central African Republic">Central African Republic</option>
                        <option value="Chad">Chad</option>
                        <option value="Chile">Chile</option>
                        <option value="China">China</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Comoros">Comoros</option>
                        <option value="Congo (Brazzaville)">Congo (Brazzaville)</option>
                        <option value="Congo (Kinshasa)">Congo (Kinshasa)</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Croatia">Croatia</option>
                        <option value="Cuba">Cuba</option>
                        <option value="Cyprus">Cyprus</option>
                        <option value="Czech Republic">Czech Republic</option>
                        <option value="Denmark">Denmark</option>
                        <option value="Djibouti">Djibouti</option>
                        <option value="Dominica">Dominica</option>
                        <option value="Dominican Republic">Dominican Republic</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="Egypt">Egypt</option>
                        <option value="El Salvador">El Salvador</option>
                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                        <option value="Eritrea">Eritrea</option>
                        <option value="Estonia">Estonia</option>
                        <option value="Eswatini">Eswatini</option>
                        <option value="Ethiopia">Ethiopia</option>
                        <option value="Fiji">Fiji</option>
                        <option value="Finland">Finland</option>
                        <option value="France">France</option>
                        <option value="Gabon">Gabon</option>
                        <option value="Gambia">Gambia</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Germany">Germany</option>
                        <option value="Ghana">Ghana</option>
                        <option value="Greece">Greece</option>
                        <option value="Grenada">Grenada</option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Guinea">Guinea</option>
                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                        <option value="Guyana">Guyana</option>
                        <option value="Haiti">Haiti</option>
                        <option value="Honduras">Honduras</option>
                        <option value="Hungary">Hungary</option>
                        <option value="Iceland">Iceland</option>
                        <option value="India">India</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="Iran">Iran</option>
                        <option value="Iraq">Iraq</option>
                        <option value="Ireland">Ireland</option>
                        <option value="Israel">Israel</option>
                        <option value="Italy">Italy</option>
                        <option value="Jamaica">Jamaica</option>
                        <option value="Japan">Japan</option>
                        <option value="Jordan">Jordan</option>
                        <option value="Kazakhstan">Kazakhstan</option>
                        <option value="Kenya">Kenya</option>
                        <option value="Kiribati">Kiribati</option>
                        <option value="Kuwait">Kuwait</option>
                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                        <option value="Laos">Laos</option>
                        <option value="Latvia">Latvia</option>
                        <option value="Lebanon">Lebanon</option>
                        <option value="Lesotho">Lesotho</option>
                        <option value="Liberia">Liberia</option>
                        <option value="Libya">Libya</option>
                        <option value="Liechtenstein">Liechtenstein</option>
                        <option value="Lithuania">Lithuania</option>
                        <option value="Luxembourg">Luxembourg</option>
                        <option value="Madagascar">Madagascar</option>
                        <option value="Malawi">Malawi</option>
                        <option value="Malaysia">Malaysia</option>
                        <option value="Maldives">Maldives</option>
                        <option value="Mali">Mali</option>
                        <option value="Malta">Malta</option>
                        <option value="Marshall Islands">Marshall Islands</option>
                        <option value="Mauritania">Mauritania</option>
                        <option value="Mauritius">Mauritius</option>
                        <option value="Mexico">Mexico</option>
                        <option value="Micronesia">Micronesia</option>
                        <option value="Moldova">Moldova</option>
                        <option value="Monaco">Monaco</option>
                        <option value="Mongolia">Mongolia</option>
                        <option value="Montenegro">Montenegro</option>
                        <option value="Morocco">Morocco</option>
                        <option value="Mozambique">Mozambique</option>
                        <option value="Myanmar">Myanmar</option>
                        <option value="Namibia">Namibia</option>
                        <option value="Nauru">Nauru</option>
                        <option value="Nepal">Nepal</option>
                        <option value="Netherlands">Netherlands</option>
                        <option value="New Zealand">New Zealand</option>
                        <option value="Nicaragua">Nicaragua</option>
                        <option value="Niger">Niger</option>
                        <option value="Nigeria">Nigeria</option>
                        <option value="North Korea">North Korea</option>
                        <option value="North Macedonia">North Macedonia</option>
                        <option value="Norway">Norway</option>
                        <option value="Oman">Oman</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="Palau">Palau</option>
                        <option value="Palestine">Palestine</option>
                        <option value="Panama">Panama</option>
                        <option value="Papua New Guinea">Papua New Guinea</option>
                        <option value="Paraguay">Paraguay</option>
                        <option value="Peru">Peru</option>
                        <option value="Philippines">Philippines</option>
                        <option value="Poland">Poland</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Qatar">Qatar</option>
                        <option value="Romania">Romania</option>
                        <option value="Russia">Russia</option>
                        <option value="Rwanda">Rwanda</option>
                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                        <option value="Saint Lucia">Saint Lucia</option>
                        <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                        <option value="Samoa">Samoa</option>
                        <option value="San Marino">San Marino</option>
                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                        <option value="Saudi Arabia">Saudi Arabia</option>
                        <option value="Senegal">Senegal</option>
                        <option value="Serbia">Serbia</option>
                        <option value="Seychelles">Seychelles</option>
                        <option value="Sierra Leone">Sierra Leone</option>
                        <option value="Singapore">Singapore</option>
                        <option value="Slovakia">Slovakia</option>
                        <option value="Slovenia">Slovenia</option>
                        <option value="Solomon Islands">Solomon Islands</option>
                        <option value="Somalia">Somalia</option>
                        <option value="South Africa">South Africa</option>
                        <option value="South Korea">South Korea</option>
                        <option value="South Sudan">South Sudan</option>
                        <option value="Spain">Spain</option>
                        <option value="Sri Lanka">Sri Lanka</option>
                        <option value="Sudan">Sudan</option>
                        <option value="Suriname">Suriname</option>
                        <option value="Sweden">Sweden</option>
                        <option value="Switzerland">Switzerland</option>
                        <option value="Syria">Syria</option>
                        <option value="Taiwan">Taiwan</option>
                        <option value="Tajikistan">Tajikistan</option>
                        <option value="Tanzania">Tanzania</option>
                        <option value="Thailand">Thailand</option>
                        <option value="Togo">Togo</option>
                        <option value="Tonga">Tonga</option>
                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                        <option value="Tunisia">Tunisia</option>
                        <option value="Turkey">Turkey</option>
                        <option value="Turkmenistan">Turkmenistan</option>
                        <option value="Tuvalu">Tuvalu</option>
                        <option value="Uganda">Uganda</option>
                        <option value="Ukraine">Ukraine</option>
                        <option value="United Arab Emirates">United Arab Emirates</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="United States">United States</option>
                        <option value="Uruguay">Uruguay</option>
                        <option value="Uzbekistan">Uzbekistan</option>
                        <option value="Vanuatu">Vanuatu</option>
                        <option value="Vatican City">Vatican City</option>
                        <option value="Venezuela">Venezuela</option>
                        <option value="Vietnam">Vietnam</option>
                        <option value="Yemen">Yemen</option>
                        <option value="Zambia">Zambia</option>
                        <option value="Zimbabwe">Zimbabwe</option>
                    </select>
                </div>
            </div>
            <!-- number Season -->
            <div class="form-group Seriesnumber" id="MoviesSeason">
                <h6 for="Movie_season"><i class="fa-solid fa-photo-film"></i> Movie season number</h6>
                <input type="text" class="form-control border-warning " placeholder="Enter number movie season" id="Movie_season" name="Movie_season">
            </div>
            <!-- group title -->
            <div class="form-group Seriesnumber" id="group_titles">
                <h6 for="group_title"><i class="bi bi-collection-fill"></i> Group title</h6>
                <input type="text" class="form-control  border-warning" placeholder="Let the group title be the same" id="group_title" name="group_title">
            </div>
            <!-- directed and authors -->
            <div class="form-row row mt-3">
                <div class="form-group col-md-6">
                    <h6 for="directed"><i class="fa-solid fa-user-secret"></i> Directed (optional)</h6>
                    <input type="text" placeholder="Name the directed" class="form-control py-2 rounded-3 mt-1" id="directed" name="directed">
                </div>
                <div class="form-group col-md-6">
                    <h6 for="authors"><i class="fa-solid fa-pen-to-square"></i> Authors (optional)</h6>
                    <input type="text" placeholder="Write so => authors-1,authors-2,authors-3,..." class="form-control py-2 rounded-3 mt-1" id="authors" name="authors">
                </div>
            </div>
            <!-- Language & Subtitle -->
            <div class="form-row row mt-3">
                <div class="form-group col-md-6">
                    <h6 for="language"><i class="fa-solid fa-language"></i><i class="fa-solid fa-language"></i> Language</h6>
                    <select class="form-control py-2 rounded-3 mt-1" id="language" name="language">
                        <option selected disabled>-- Language --</option>
                        <option value="null">None</option>
                        <option value="Kurdish">Kurdish</option>
                        <option value="English">English</option>
                        <option value="Arabic">Arabic</option>
                        <option value="Spanish">Spanish</option>
                        <option value="Chinese (Mandarin)">Chinese (Mandarin)</option>
                        <option value="French">French</option>
                        <option value="German">German</option>
                        <option value="Russian">Russian</option>
                        <option value="Portuguese">Portuguese</option>
                        <option value="Hindi">Hindi</option>
                        <option value="Bengali">Bengali</option>
                        <option value="Japanese">Japanese</option>
                        <option value="Punjabi">Punjabi</option>
                        <option value="Javanese">Javanese</option>
                        <option value="Italian">Italian</option>
                        <option value="Turkish">Turkish</option>
                        <option value="Vietnamese">Vietnamese</option>
                        <option value="Korean">Korean</option>
                        <option value="Persian (Farsi)">Persian (Farsi)</option>
                        <option value="Swahili">Swahili</option>
                        <option value="Dutch">Dutch</option>
                        <option value="Greek">Greek</option>
                        <option value="Hebrew">Hebrew</option>
                        <option value="Thai">Thai</option>
                        <option value="Urdu">Urdu</option>
                        <option value="Malay">Malay</option>
                        <option value="Filipino (Tagalog)">Filipino (Tagalog)</option>
                        <option value="Swedish">Swedish</option>
                        <option value="Norwegian">Norwegian</option>
                        <option value="Finnish">Finnish</option>
                        <option value="Danish">Danish</option>
                        <option value="Hungarian">Hungarian</option>
                        <option value="Czech">Czech</option>
                        <option value="Romanian">Romanian</option>
                        <option value="Polish">Polish</option>
                        <option value="Bulgarian">Bulgarian</option>
                        <option value="Ukrainian">Ukrainian</option>
                        <option value="Croatian">Croatian</option>
                        <option value="Serbian">Serbian</option>
                        <option value="Slovak">Slovak</option>
                        <option value="Slovenian">Slovenian</option>
                        <option value="Latvian">Latvian</option>
                        <option value="Lithuanian">Lithuanian</option>
                        <option value="Estonian">Estonian</option>
                        <option value="Icelandic">Icelandic</option>
                        <option value="Albanian">Albanian</option>
                        <option value="Armenian">Armenian</option>
                        <option value="Azerbaijani">Azerbaijani</option>
                        <option value="Basque">Basque</option>
                        <option value="Belarusian">Belarusian</option>
                        <option value="Catalan">Catalan</option>
                        <option value="Esperanto">Esperanto</option>
                        <option value="Georgian">Georgian</option>
                        <option value="Gujarati">Gujarati</option>
                        <option value="Hausa">Hausa</option>
                        <option value="Hawaiian">Hawaiian</option>
                        <option value="Irish">Irish</option>
                        <option value="Kannada">Kannada</option>
                        <option value="Kazakh">Kazakh</option>
                        <option value="Khmer">Khmer</option>
                        <option value="Kinyarwanda">Kinyarwanda</option>
                        <option value="Lao">Lao</option>
                        <option value="Latvian">Latvian</option>
                        <option value="Luxembourgish">Luxembourgish</option>
                        <option value="Macedonian">Macedonian</option>
                        <option value="Malayalam">Malayalam</option>
                        <option value="Maltese">Maltese</option>
                        <option value="Maori">Maori</option>
                        <option value="Mongolian">Mongolian</option>
                        <option value="Nepali">Nepali</option>
                        <option value="Norwegian">Norwegian</option>
                        <option value="Pashto">Pashto</option>
                        <option value="Quechua">Quechua</option>
                        <option value="Sindhi">Sindhi</option>
                        <option value="Sinhala">Sinhala</option>
                        <option value="Somali">Somali</option>
                        <option value="Sundanese">Sundanese</option>
                        <option value="Tajik">Tajik</option>
                        <option value="Tamil">Tamil</option>
                        <option value="Telugu">Telugu</option>
                        <option value="Turkmen">Turkmen</option>
                        <option value="Uighur">Uighur</option>
                        <option value="Uzbek">Uzbek</option>
                        <option value="Welsh">Welsh</option>
                        <option value="Xhosa">Xhosa</option>
                    </select>


                </div>
                <div class="form-group col-md-6">
                    <h6 for="subtitle"><i class="fa-solid fa-closed-captioning"></i> Subtitle</h6>
                    <select class="form-control py-2 rounded-3 mt-1" id="subtitle" name="subtitle">
                        <option selected disabled>-- Subtitle --</option>
                        <option value="null">None</option>
                        <option value="Kurdish">Kurdish</option>
                        <option value="English">English</option>
                        <option value="Arabic">Arabic</option>
                        <option value="Spanish">Spanish</option>
                        <option value="Chinese (Mandarin)">Chinese (Mandarin)</option>
                        <option value="French">French</option>
                        <option value="German">German</option>
                        <option value="Russian">Russian</option>
                        <option value="Portuguese">Portuguese</option>
                        <option value="Hindi">Hindi</option>
                        <option value="Bengali">Bengali</option>
                        <option value="Japanese">Japanese</option>
                        <option value="Punjabi">Punjabi</option>
                        <option value="Javanese">Javanese</option>
                        <option value="Italian">Italian</option>
                        <option value="Turkish">Turkish</option>
                        <option value="Vietnamese">Vietnamese</option>
                        <option value="Korean">Korean</option>
                        <option value="Persian (Farsi)">Persian (Farsi)</option>
                        <option value="Swahili">Swahili</option>
                        <option value="Dutch">Dutch</option>
                        <option value="Greek">Greek</option>
                        <option value="Hebrew">Hebrew</option>
                        <option value="Thai">Thai</option>
                        <option value="Urdu">Urdu</option>
                        <option value="Malay">Malay</option>
                        <option value="Filipino (Tagalog)">Filipino (Tagalog)</option>
                        <option value="Swedish">Swedish</option>
                        <option value="Norwegian">Norwegian</option>
                        <option value="Finnish">Finnish</option>
                        <option value="Danish">Danish</option>
                        <option value="Hungarian">Hungarian</option>
                        <option value="Czech">Czech</option>
                        <option value="Romanian">Romanian</option>
                        <option value="Polish">Polish</option>
                        <option value="Bulgarian">Bulgarian</option>
                        <option value="Ukrainian">Ukrainian</option>
                        <option value="Croatian">Croatian</option>
                        <option value="Serbian">Serbian</option>
                        <option value="Slovak">Slovak</option>
                        <option value="Slovenian">Slovenian</option>
                        <option value="Latvian">Latvian</option>
                        <option value="Lithuanian">Lithuanian</option>
                        <option value="Estonian">Estonian</option>
                        <option value="Icelandic">Icelandic</option>
                        <option value="Albanian">Albanian</option>
                        <option value="Armenian">Armenian</option>
                        <option value="Azerbaijani">Azerbaijani</option>
                        <option value="Basque">Basque</option>
                        <option value="Belarusian">Belarusian</option>
                        <option value="Catalan">Catalan</option>
                        <option value="Esperanto">Esperanto</option>
                        <option value="Georgian">Georgian</option>
                        <option value="Gujarati">Gujarati</option>
                        <option value="Hausa">Hausa</option>
                        <option value="Hawaiian">Hawaiian</option>
                        <option value="Irish">Irish</option>
                        <option value="Kannada">Kannada</option>
                        <option value="Kazakh">Kazakh</option>
                        <option value="Khmer">Khmer</option>
                        <option value="Kinyarwanda">Kinyarwanda</option>
                        <option value="Lao">Lao</option>
                        <option value="Latvian">Latvian</option>
                        <option value="Luxembourgish">Luxembourgish</option>
                        <option value="Macedonian">Macedonian</option>
                        <option value="Malayalam">Malayalam</option>
                        <option value="Maltese">Maltese</option>
                        <option value="Maori">Maori</option>
                        <option value="Mongolian">Mongolian</option>
                        <option value="Nepali">Nepali</option>
                        <option value="Norwegian">Norwegian</option>
                        <option value="Pashto">Pashto</option>
                        <option value="Quechua">Quechua</option>
                        <option value="Sindhi">Sindhi</option>
                        <option value="Sinhala">Sinhala</option>
                        <option value="Somali">Somali</option>
                        <option value="Sundanese">Sundanese</option>
                        <option value="Tajik">Tajik</option>
                        <option value="Tamil">Tamil</option>
                        <option value="Telugu">Telugu</option>
                        <option value="Turkmen">Turkmen</option>
                        <option value="Uighur">Uighur</option>
                        <option value="Uzbek">Uzbek</option>
                        <option value="Welsh">Welsh</option>
                        <option value="Xhosa">Xhosa</option>
                    </select>
                </div>
            </div>
            <!-- Duration, Rating -->
            <div class="form-row row mt-3">
                <div id="divduration" class="form-group col-md-6">
                    <h6 for="duration"><i class="fa-solid fa-business-time"></i> Movie duration</h6>
                    <input type="text" placeholder="Enter time in minutes" class="form-control py-2 rounded-3 mt-1" id="duration" name="duration">

                </div>
                <div class="form-group col-md-6">
                    <h6 for="rating"><i class="fa-brands fa-imdb"></i> IMDb rating</h6>
                    <input type="text" placeholder="Enter a rating from 1.0 to 10.0" class="form-control py-2 rounded-3 mt-1" id="rating" name="rating">

                </div>
            </div>
            <!-- Viewer Age and Actors -->
            <div class="form-row row mt-3">
                <div class="form-group col-md-6">
                    <h6 for="viewer_age"><i class="fa-solid fa-input-numeric"></i> Viewer age (optional)</h6>
                    <input type="number" min="4" max="24" placeholder="Viewer age from 4 to 24 years" class="form-control py-2 rounded-3 mt-1" id="viewer_age" name="viewer_age">

                </div>
                <div class="form-group col-md-6">
                    <h6 for="actor_count"><i class="fa-solid fa-elevator"></i> Number of actors</h6>
                    <input type="text" placeholder="Enter number of actors" min="1" max="20" class="form-control py-2 rounded-3 mt-1" id="actor_count" name="actor_count">

                </div>
            </div>
            <!-- actor -->
            <div id="actors_container"></div>
            <div class="form-row row mt-3">
                <!-- Release Year -->
                <div class="form-group col-md-6">
                    <h6 for="release_date"><i class="fa-solid fa-calendar-days"></i> Release year</h6>
                    <select class="form-control  py-2 rounded-3 mt-1" name="release_date">
                        <option value="">-- Select Year --</option>
                        <?php $currentYear = date("Y");
                        for ($y = $currentYear; $y >= 1900; $y--) echo "<option value=\"$y\">$y</option>"; ?>
                    </select>
                </div>

                <!-- Trailer & Files -->
                <div class="form-group col-md-6">
                    <h6 for="trailer_url"><i class="fa-solid fa-link"></i> Trailer link</h6>
                    <input type="url" placeholder="Link youtube" class="form-control py-2 rounded-3 mt-1" id="trailer_url" name="trailer_url">

                </div>
            </div>

            <div class="w-100 mt-3 d-flex flex-column flex-md-row gap-4">
                <!-- وێنەی فیلم -->
                <div class="form-group w-100 flex-fill">
                    <div class="input-group w-100 d-flex flex-column gap-2">
                        <div class="flex"><i class="bi bi-image-fill me-1"></i>Card image</div>
                        <label class="btn border bg-white border-purple-600 btn_purpel_upload rounded-2 w-100 d-flex align-items-center justify-content-center gap-2" for="image" style="cursor:pointer;">
                            <i class="fas fa-upload"></i> &nbsp; Choose Image
                        </label>
                        <input class="form-control d-none w-100" type="file" id="image" name="image" accept="image/*">
                    </div>
                    <small id="imageFileName" class="text-white mt-1 d-block text-truncate"></small>
                </div>
                <div class="form-group w-100 flex-fill">
                    <div class="input-group w-100 d-flex flex-column gap-2">
                        <div class="flex"><i class="bi bi-image-fill me-1"></i>back image</div>
                        <label class="btn border bg-white border-purple-600 btn_purpel_upload rounded-2 w-100 d-flex align-items-center justify-content-center gap-2" for="image2" style="cursor:pointer;">
                            <i class="fas fa-upload"></i> &nbsp; Choose Image
                        </label>
                        <input class="form-control d-none w-100" type="file" id="image2" name="image2" accept="image2/*">
                    </div>
                    <small id="imageFileName" class="text-white mt-1 d-block text-truncate"></small>
                </div>

                <!-- ڤیدیۆی فیلم -->
                <div id="divvideo" class="form-group flex-fill w-100">
                    <div class="flex items-center mb-2 gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="bi w-4 h-4" viewBox="0 0 16 16" aria-hidden="true">
                            <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
                        </svg>
                        <span>Link video</span>
                    </div>

                    <div class="input-group d-flex flex-column gap-2">
                        <!-- <label class="btn btn_purpel_upload rounded-4 w-100 d-flex align-items-center justify-content-center gap-2" for="video" style="cursor:pointer;">
                <i class="fas fa-file-video"></i> &nbsp; Choose Video
            </label> -->
                        <input class="form-control w-100" type="url" name="video" id="video" placeholder="Enter URL video">
                    </div>
                    <small id="videoFileName" class="text-white mt-1 d-block text-truncate"></small>
                </div>
            </div>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const movieTypeSelect = document.getElementById("movie_type");
                    const video = document.getElementById("video");
                    const divvideo = document.getElementById("divvideo");
                    const duration = document.getElementById("duration");
                    const divduration = document.getElementById("divduration");


                    movieTypeSelect.addEventListener("change", function() {
                        const value = movieTypeSelect.value;
                        const last6 = value.slice(-6).toLowerCase(); // کۆتا ٦ پیت

                        if (last6 === "series") {
                            video.classList.add("hidden"); // پنهان بکە
                            divvideo.classList.add("hidden"); // پنهان بکە
                            duration.classList.add("hidden"); // پنهان بکە
                            divduration.classList.add("hidden"); // پنهان بکە
                        } else {
                            video.classList.remove("hidden"); // پەیدا بکە
                            divvideo.classList.remove("hidden"); // پەیدا بکە
                            duration.classList.remove("hidden"); // پەیدا بکە
                            divduration.classList.remove("hidden"); // پەیدا بکە
                        }
                    });

                    // Optional: ئەگەر بەکارهێنەر سەرەتا هەلبژێردووە
                    movieTypeSelect.dispatchEvent(new Event("change"));
                });
            </script>

            <!-- From Uiverse.io by Masoodaykhan -->
            <div class="flex justify-center items-center gap-6 mt-5">
                <button
                    class="font-sans flex justify-center gap-2 items-center mx-auto shadow-xl text-lg text-gray-50 bg-[#a51313] backdrop-blur-md lg:font-semibold isolation-auto border-gray-50 before:absolute before:w-full before:transition-all before:duration-700 before:hover:w-full before:-left-full before:hover:left-0 before:rounded-4 before:bg-[gray] hover:text-black before:-z-10 before:aspect-square before:hover:scale-200 before:hover:duration-500 relative z-10 px-4 py-2 overflow-hidden border-2 rounded-4 group"
                    type="submit">
                    Clear
                </button>
                <button
                    class="font-sans flex justify-center gap-2 items-center mx-auto shadow-xl text-lg text-gray-50 bg-[#0A0D2D] backdrop-blur-md lg:font-semibold isolation-auto border-gray-50 before:absolute before:w-full before:transition-all before:duration-700 before:hover:w-full before:-left-full before:hover:left-0 before:rounded-4 before:bg-[gray] hover:text-black before:-z-10 before:aspect-square before:hover:scale-200 before:hover:duration-500 relative z-10 px-4 py-2 overflow-hidden border-2 rounded-4 group"
                    type="submit">
                    Submit
                </button>
            </div>
            <div id="response" class="mt-4"></div>

            <script>
                // Handle form submission with AJAX
                document.getElementById('uploadForm').addEventListener('submit', function(e) {
                    e.preventDefault(); // Prevent default form submission
                    const formData = new FormData(this);
                    fetch('add_movies_ajax.php', {
                            method: 'POST',
                            body: formData
                        })
                        .then(res => res.text())
                        .then(data => {
                            document.getElementById('response').innerHTML = data; // Show server response
                        })
                        .catch(err => {
                            document.getElementById('response').innerHTML = `<div class="alert alert-danger">❌ Error: ${err}</div>`;
                        });
                });

                // Show or hide the number input field based on movie type
                const movie_type = document.getElementById('movie_type');
                const numberInputDiv = document.getElementById('MoviesSeason');
                const group_titleInputDiv = document.getElementById('group_titles');
                movie_type.addEventListener('change', function() {
                    const value = this.value.trim(); // پاککردنی بوشایی
                    const endsWithSeries = value.slice(-6).toLowerCase() === 'series'; // دڵنیابوون لە کۆتا 6 پیت

                    if (value === 'Movie Season' || endsWithSeries) {
                        numberInputDiv.style.display = 'block';
                        group_titleInputDiv.style.display = 'block';
                    } else {
                        numberInputDiv.style.display = 'none';
                        group_titleInputDiv.style.display = 'none';
                    }


                });
                // Dynamically generate actor input fields based on the actor count input
                const actorCountInput = document.getElementById("actor_count");
                const actorsContainer = document.getElementById("actors_container");
                actorCountInput.addEventListener("input", function() {
                    actorsContainer.innerHTML = ""; // Clear previous inputs
                    const count = parseInt(this.value);
                    if (!isNaN(count) && count > 0) {
                        for (let i = 1; i <= count; i++) {
                            const actorDiv = document.createElement("div");
                            actorDiv.classList.add("actor-entry");
                            actorDiv.innerHTML = `
                <div class="border rounded-2 border-info p-3 my-4">
                    <h5 class="purple ">Actor ${i}</h5>
                    <div class="form-group  my-4">
                        <label class="purple"  for="actor_name_${i}">Actor Name</label>
                        <input type="text" class="form-control" name="actor_name_${i}" id="actor_name_${i}" required>
                    </div>
                    <div class="form-group  my-4">
                        <label class="purple" for="actor_image_${i}">Actor Image</label>
                        <br>
                        <input type="file" class="form-control-file text-white" name="actor_image_${i}" id="actor_image_${i}" accept="image/*" required>
                    </div>
                    <div class="form-group  my-4">
                        <label class="purple" for="actor_info_${i}">About Actor</label>
                        <textarea class="form-control text-dark" name="actor_info_${i}" id="actor_info_${i}" rows="2" required></textarea>
                    </div>
                </div>`;
                            actorsContainer.appendChild(actorDiv);
                        }
                    }
                });
            </script>


        </div>
    </form>
    <style>
        #video {
            display: block;
        }

        .hidden {
            display: none !important;
        }

        .btn_animation i {
            display: inline-block;
        }

        .btn_animation:hover i {
            animation: slideIconHover 1s ease infinite;
        }

        @keyframes slideIconHover {
            0% {
                transform: translateX(0);
            }

            50% {
                transform: translateX(-8px);
            }

            100% {
                transform: translateX(0);
            }
        }

        .btn_purpel_upload {
            color: rgb(102, 0, 161) !important;

        }

        ::placeholder {
            font-size: 13px;
            color: rgb(102, 0, 161) !important;
        }

        .Seriesnumber {
            display: none;
            margin-top: 10px;
        }
    </style>
