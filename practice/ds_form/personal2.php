
            <h2 class="font-semibold text-sm">Personal Information 2</h2>

            <div>
              <label for="nationality" class="font-semibold"
                >Country/Region of Origin (Nationality):
                <span
                  class="text-blue-600 cursor-pointer"
                  data-bs-toggle="tooltip"
                  title="Enter all nationalities you currently hold and all nationalities you have previously held, regardless of whether you have formally and/or legally relinquished the nationality. If the country where you previously held nationality is no longer a political entity or country, select the nationality that corresponds with the name of the country that is currently used for that location.."
                  >ℹ️</span
                >
              </label> 
              <select
                id="nationality"
                name="nationality"
                class="w-full border rounded px-3 py-2"
                required
              >
                <option>Select One</option>
              </select>
            </div>

            <div class="mb-4">
              <label class="block font-semibold mb-1">
                Do you hold or have you held any nationality other than the one
                indicated above?
              </label>
              <div class="flex space-x-4">
                <label>
                  <input
                    type="radio"
                    name="other-nationality"
                    value="yes"
                    required
                  />
                  Yes
                </label>
                <label>
                  <input type="radio" name="other-nationality" value="no" />
                  No
                </label>
              </div>
            </div>

            <div
              id="other-nationality-section"
              class="hidden space-y-4 border p-4 rounded bg-gray-100"
            >
              <div>
                <label class="block font-semibold mb-1"
                  >Select Other Nationality:</label
                >
                <select
                  id="other-nationality-select"
                  name="other-nationality-select"
                  class="w-full border rounded px-3 py-2"
                >
                  <option value="">Select One</option>
                 
                </select>
              </div>

              <div id="passport-question" class="hidden">
                <label class="block font-semibold mb-1"
                  >Do you hold a passport for this country?</label
                >
                <div class="flex gap-4">
                  <label
                    ><input type="radio" name="passport-held" value="yes" />
                    Yes</label
                  >
                  <label
                    ><input type="radio" name="passport-held" value="no" />
                    No</label
                  >
                </div>
              </div>

              <div id="passport-number" class="hidden">
                <label class="block font-semibold mb-1">Passport Number:</label>
                <input name="Pnumber" type="text" class="w-full border rounded px-3 py-2" />
              </div>
            </div>

            <div class="mb-4">
              <label class="block font-semibold mb-1"
                >Are you a permanent resident of a country/region other than
                your country/region of origin (nationality) indicated above?
                <span
                  class="text-blue-600 cursor-pointer"
                  data-bs-toggle="tooltip"
                  title="Permanent resident means any individual who has been legally granted by a country/region permission to live and work without time limitation in that country/region."
                  >ℹ️</span
                >
              </label>
              <div class="flex space-x-4">
                <label
                  ><input
                    type="radio"
                    name="other_permanent"
                    value="yes"
                    id="other-permanent-yes"
                    required
                  />
                  Yes</label
                >
                <label
                  ><input type="radio" name="other_permanent" value="no" />
                  No</label
                >
              </div>
            </div>

            <div id="other-permanent-container" class="hidden mb-4 space-y-4">
              <h2 class="text-md font-semibold text-gray-800">
                Provide the following information:
              </h2>
              <div id="permanent-fields-wrapper"></div>
              <button
                type="button"
                id="add-other-permanent-btn"
                class="bg-green-600 text-white py-1 px-3 rounded hover:bg-green-700"
              >
                + Add Another
              </button>
            </div>
            <div class="state-toggle-block">
              <div class="mb-2">
                <label class="font-semibold block mb-1"
                  >National Identification Number:<span
                    class="text-blue-600 cursor-pointer"
                    data-bs-toggle="tooltip"
                    title="Your National ID Number is a unique number that your government provides. The U.S. Government provides unique numbers to those who seek employment (Social Security Number) or pay taxes (Taxpayer ID)."
                    >ℹ️</span
                  ></label
                >
                <input
                  type="text"
                  name="NINum"
                  class="w-full border rounded px-3 py-2 state-input"
                  required
                />
                <div class="flex items-center gap-2 text-sm mt-1">
                  <input type="checkbox" class="state-toggle-checkbox" />
                  <label>Does Not Apply</label>
                </div>
              </div>
            </div>

            <div class="mb-4">
              <label class="block font-semibold mb-1"
                >U.S. Social Security Number</label
              >
              <div class="flex items-center space-x-2">
                <input
                  type="text"
                  id="ssn-part1"
                  name="ssn-part1"
                  maxlength="3"
                  class="w-16 text-center border rounded px-2 py-1"
                  required
                />
                <span>-</span>
                <input
                  type="text"
                  id="ssn-part2"
                  name="ssn-part2"
                  maxlength="2"
                  class="w-12 text-center border rounded px-2 py-1"
                />
                <span>-</span>
                <input
                  type="text"
                  id="ssn-part3"
                  name="ssn-part3"
                  maxlength="4"
                  class="w-20 text-center border rounded px-2 py-1"
                />
              </div>

              <div class="mt-2 flex items-center gap-1 text-sm">
                <input type="checkbox" id="toggle-checkbox" />
                <label for="toggle-checkbox">Does Not Apply</label>
              </div>
            </div>

            <div class="state-toggle-block">
              <div class="mb-2">
                <label class="font-semibold block mb-1"
                  >U.S. Taxpayer ID Number</label
                >
                <input
                  type="text"
                  name="taxpayer"
                  class="w-full border rounded px-3 py-2 state-input"
                  required
                />
                <div class="flex items-center gap-2 text-sm mt-1">
                  <input type="checkbox" class="state-toggle-checkbox" />
                  <label>Does Not Apply</label>
                </div>
              </div>
            </div>
         