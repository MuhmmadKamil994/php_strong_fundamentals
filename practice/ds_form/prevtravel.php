 <h2 class="font-semibold text-lg mb-4">
              Previous U.S. Travel Information
            </h2>

            <!-- Note Box -->
            <div
              class="border border-gray-300 bg-white p-4 rounded-md text-sm text-gray-700 mb-6"
            >
              <strong>NOTE:</strong> Provide the following previous U.S. travel
              information. Provide complete and accurate information to all
              questions that require an explanation.
            </div>
            <div class="mb-4">
              <label class="block font-semibold mb-1">
                Q: Have you ever been in the U.S.?
              </label>
              <div class="flex space-x-6">
                <label class="flex items-center gap-2">
                  <input type="radio" name="previous-traveling" value="yes" />
                  Yes
                </label>
                <label class="flex items-center gap-2">
                  <input type="radio" name="previous-traveling" value="no" />
                  No
                </label>
              </div>
            </div>
            <div id="arrival-stay-container" class="hidden">
              <div
                class="arrival-stay-block mb-4 p-4 border border-gray-300 rounded-md bg-gray-50"
              >
                <div class="mb-4">
                  <label for="arrival-intend" class="font-semibold block mb-1"
                    >Intended Date of Arrival:</label
                  >
                  <input
                    type="date"
                    name="arrival-intend"
                    class="w-full border border-gray-300 rounded px-3 py-2"
                    required
                  />
                </div>

                <div class="mb-4">
                  <label for="length-stay" class="font-semibold block mb-1"
                    >Intended Length of Stay in U.S</label
                  >
                  <div class="flex items-center gap-3">
                    <input
                      type="text"
                      maxlength="3"
                      name="length-stay"
                      class="w-16 text-center border rounded px-2 py-1"
                      required
                    />
                    <select
                      class="flex-grow border border-gray-300 rounded px-3 py-2"
                      required
                    >
                      <option value="">--Select Option--</option>
                      <option value="YE">YEAR(S)</option>
                      <option value="MO">MONTH(S)</option>
                      <option value="WE">WEEK(S)</option>
                      <option value="DA">DAY(S)</option>
                    </select>
                  </div>
                </div>

                <button
                  type="button"
                  class="remove-arrival-btn hidden text-red-600 text-sm font-semibold"
                >
                  Remove
                </button>
              </div>

              <button
                type="button"
                id="add-arrival-stay-btn"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm"
              >
                Add Another
              </button>

              <div class="mb-4">
                <label class="block font-semibold mb-1">
                  Q: Do you or did you ever hold a U.S. Driver’s License?
                </label>
                <div class="flex space-x-6">
                  <label class="flex items-center gap-2">
                    <input type="radio" name="driving-License" value="yes" />
                    Yes
                  </label>
                  <label class="flex items-center gap-2">
                    <input type="radio" name="driving-License" value="no" />
                    No
                  </label>
                </div>
              </div>

              <div id="drivers-license-container" class="hidden">
                <h3 class="font-semibold text-md mb-2">
                  Provide the following information:
                </h3>

                <div
                  class="license-block mb-4 p-4 border border-gray-300 rounded-md bg-gray-50"
                >
                  <div class="mb-3">
                    <label for="Dl-number" class="block font-semibold mb-1"
                      >Driver's License Number:</label
                    >
                    <input
                      type="text"
                      name="Dl-number"
                      class="w-full border border-gray-300 rounded px-3 py-2"
                      required
                    />
                  </div>
                  <div>
                    <label for="us-states" class="font-semibold mb-1 block"
                      >State</label
                    >
                    <select
                      id="us-states3"
                      name="us-states3"
                      class="us-states w-full border border-gray-300 rounded px-3 py-2"
                      required
                    >
                      <option value="">Loading states...</option>
                    </select>
                  </div>

                  <button
                    type="button"
                    class="remove-license-btn hidden text-red-600 text-sm font-semibold"
                  >
                    Remove
                  </button>
                </div>

                <button
                  type="button"
                  id="add-license-btn"
                  class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm"
                >
                  Add Another
                </button>
              </div>
            </div>

            <div class="mb-4">
              <label class="block font-semibold mb-1">
                Q: Have you ever been issued a U.S. Visa?
              </label>
              <div class="flex space-x-6">
                <label class="flex items-center gap-2">
                  <input type="radio" name="visa-issue" value="yes" />
                  Yes
                </label>
                <label class="flex items-center gap-2">
                  <input type="radio" name="visa-issue" value="no" />
                  No
                </label>
              </div>
            </div>

            <div
              id="visa-information-container"
              class="hidden border border-gray-300 bg-gray-50 p-6 rounded-md shadow-sm mt-4"
            >
              <h3 class="font-semibold text-md mb-2">Previous U.S. Visas:</h3>

              <div class="mb-4">
                <label for="visa-date" class="font-semibold block mb-1"
                  >Date Last Visa Was Issued:</label
                >
                <input
                  type="date"
                  name="visa-date"
                  class="w-full border border-gray-300 rounded px-3 py-2"
                  required
                />
              </div>

              <div
                class="state-toggle-block mt-4 border border-gray-300 p-4 rounded-md bg-gray-50"
              >
                <div class="mb-3">
                  <label for="v-number" class="block font-semibold mb-1">Visa Number:</label>
                  <input
                    type="text"
                    name="v-number"
                    class="state-input w-full border border-gray-300 rounded px-3 py-2"
                    required
                  />
                </div>

                <div class="flex items-center gap-2 text-sm">
                  <input
                    type="checkbox"
                    class="state-toggle-checkbox accent-blue-600"
                  />
                  <label class="text-gray-700">Does Not Apply</label>
                </div>
              </div>
              <div class="mb-4">
                <label class="block font-semibold mb-1">
                  Q: Are you applying for the same type of visa?
                </label>
                <div class="flex space-x-6">
                  <label class="flex items-center gap-2">
                    <input type="radio" name="same-type" value="yes" />
                    Yes
                  </label>
                  <label class="flex items-center gap-2">
                    <input type="radio" name="same-type" value="no" />
                    No
                  </label>
                </div>
              </div>
              <div class="mb-4">
                <label class="block font-semibold mb-1">
                  Q: Are you applying in the same country or location where the
                  visa above was issued, and is this country or location your
                  place of principal of residence?
                </label>
                <div class="flex space-x-6">
                  <label class="flex items-center gap-2">
                    <input type="radio" name="same-country" value="yes" />
                    Yes
                  </label>
                  <label class="flex items-center gap-2">
                    <input type="radio" name="same-country" value="no" />
                    No
                  </label>
                </div>
              </div>
              <div class="mb-4">
                <label class="block font-semibold mb-1">
                  Q: Have you been ten-printed?
                </label>
                <div class="flex space-x-6">
                  <label class="flex items-center gap-2">
                    <input type="radio" name="ten-print" value="yes" />
                    Yes
                  </label>
                  <label class="flex items-center gap-2">
                    <input type="radio" name="ten-print" value="no" />
                    No
                  </label>
                </div>
              </div>

              <div class="mb-4">
                <label class="block font-semibold mb-1">
                  Q: Has your U.S. Visa ever been lost or stolen?
                </label>
                <div class="flex space-x-6">
                  <label class="flex items-center gap-2">
                    <input
                      id="visa-stolen-yes"
                      type="radio"
                      name="visa-stolen"
                      value="yes"
                    />
                    Yes
                  </label>
                  <label class="flex items-center gap-2">
                    <input
                      id="visa-stolen-no"
                      type="radio"
                      name="visa-stolen"
                      value="no"
                    />
                    No
                  </label>
                </div>
              </div>
              <div
                id="visa-stolen-details"
                class="mt-4 hidden border border-gray-300 p-4 rounded-md bg-gray-50"
              >
                <div class="mb-3">
                  <label class="block font-semibold mb-1"
                    >Enter year visa was lost or stolen:</label
                  >
                  <input
                    type="number"
                    min="1900"
                    max="2099"
                    class="w-full border border-gray-300 rounded px-3 py-2"
                    placeholder="Year"
                  />
                </div>
                <div class="mb-3">
                  <label class="block font-semibold mb-1">Explain:</label>
                  <textarea
                    rows="4"
                    class="w-full border border-gray-300 rounded px-3 py-2"
                    placeholder="Provide explanation here..."
                  ></textarea>
                </div>
              </div>
              <div class="mb-4">
                <label class="block font-semibold mb-1">
                  Q:Has your U.S. Visa ever been cancelled or revoked?
                </label>
                <div class="flex space-x-6">
                  <label class="flex items-center gap-2">
                    <input
                      id="visa-cancel-yes"
                      type="radio"
                      name="visa-cancel"
                      value="yes"
                    />
                    Yes
                  </label>
                  <label class="flex items-center gap-2">
                    <input
                      id="visa-cancel-no"
                      type="radio"
                      name="visa-cancel"
                      value="no"
                    />
                    No
                  </label>
                </div>
              </div>
              <div
                id="visa-cancel-details"
                class="mt-4 hidden border border-gray-300 p-4 rounded-md bg-gray-50"
              >
                <label class="block font-semibold mb-1">Explain:</label>
                <textarea
                  rows="4"
                  class="w-full border border-gray-300 rounded px-3 py-2"
                  placeholder="Provide explanation here..."
                ></textarea>
              </div>
            </div>
            <div class="mb-4">
              <label class="block font-semibold mb-1">
                Q: Have you ever been refused a U.S. Visa, or been refused
                admission to the United States, or withdrawn your application
                for admission at the port of entry?
              </label>
              <div class="flex space-x-6">
                <label class="flex items-center gap-2">
                  <input type="radio" name="application-refused" value="yes" />
                  Yes
                </label>
                <label class="flex items-center gap-2">
                  <input type="radio" name="application-refused" value="no" />
                  No
                </label>
              </div>
            </div>
            <div
              id="application-refused-details"
              class="mt-4 hidden border border-gray-300 p-4 rounded-md bg-gray-50"
            >
              <label class="block font-semibold mb-1">Explain:</label>
              <textarea
                rows="4"
                class="w-full border border-gray-300 rounded px-3 py-2"
                placeholder="Provide explanation here..."
              ></textarea>
            </div>
            <div class="mb-4">
              <label class="block font-semibold mb-1">
                Q: Has anyone ever filed an immigrant petition on your behalf
                with the United States Citizenship and Immigration Services?
              </label>
              <div class="flex space-x-6">
                <label class="flex items-center gap-2">
                  <input type="radio" name="immigrant" value="yes" />
                  Yes
                </label>
                <label class="flex items-center gap-2">
                  <input type="radio" name="immigrant" value="no" />
                  No
                </label>
              </div>
            </div>
            <div
              id="immigrant-details"
              class="mt-4 hidden border border-gray-300 p-4 rounded-md bg-gray-50"
            >
              <label class="block font-semibold mb-1">Explain:</label>
              <textarea
                rows="4"
                class="w-full border border-gray-300 rounded px-3 py-2"
                placeholder="Provide explanation here..."
              ></textarea>
            </div>
          