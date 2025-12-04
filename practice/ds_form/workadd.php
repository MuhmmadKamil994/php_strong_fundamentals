
            <h1 class="font-semibold text-lg mb-4">
              Additional Work/Education/Training Information
            </h1>
            <div
              class="border border-gray-400 bg-gray-50 p-4 rounded-md text-sm text-gray-700 mb-6"
            >
              <strong>NOTE:</strong>Provide the following work, education, or
              training related information. Provide complete and accurate
              information to all questions that require an explanation.
            </div>
            <div id="Clan-details" class="mb-4 mt-2">
              <label class="block font-semibold mb-2">
                Q: Do you belong to a clan or tribe?
              </label>
              <div class="flex space-x-4">
                <label>
                  <input type="radio" name="clan" value="yes" id="clan-yes" />
                  Yes
                </label>
                <label>
                  <input type="radio" name="clan" value="no" id="clan-no" />
                  No
                </label>
              </div>
            </div>

            <div id="tribe-section" class="hidden">
              <h3 class="font-semibold text-sm mb-0">
                Provide the following Information
              </h3>
              <div class="mb-2 bg-[#f0f4f8] p-2 rounded-sm">
                <label for="tribe-name" class="font-semibold block mb-1"
                  >Clan or Tribe Name</label
                >
                <input
                name="tribe-name"
                  type="text"
                  class="w-full border rounded px-3 py-2 state-input"
                  required
                />
              </div>
            </div>
            <h3 class="font-semibold text-sm mb-0">
              Provide a list of languages which you speak
            </h3>

            <div id="languages-container">
              <div class="language-block mb-2 bg-[#f0f4f8] p-2 rounded-sm">
                <label for="language" class="font-semibold block mb-1">Language Name</label>
                <input
                name="language"
                  type="text"
                  class="w-full border rounded px-3 py-2 state-input"
                  required
                />
                <button
                  type="button"
                  class="remove-btn mt-2 bg-red-500 text-white px-2 py-1 rounded hidden"
                >
                  Remove
                </button>
              </div>
            </div>

            <button
              type="button"
              id="add-language"
              class="mt-2 bg-blue-500 text-white px-3 py-1 rounded"
            >
              + Add Another
            </button>

            <div id="last-travel-details" class="mb-4 mt-2">
              <label class="block font-semibold mb-2">
                Q: Have you traveled to any countries/regions within the last
                five years?
              </label>
              <div class="flex space-x-4">
                <label>
                  <input
                    type="radio"
                    name="last-travel"
                    value="yes"
                    id="last-travel-yes"
                  />
                  Yes
                </label>
                <label>
                  <input
                    type="radio"
                    name="last-travel"
                    value="no"
                    id="last-travel-no"
                  />
                  No
                </label>
              </div>
            </div>

            <div id="last-travel-container">
              <div class="last-block mb-2 bg-[#f0f4f8] p-2 rounded-sm">
                <label for="country-drop" class="font-semibold block mb-1"
                  >Country/Region<span
                    class="text-blue-600 cursor-pointer"
                    data-bs-toggle="tooltip"
                    title="Please select the current name of the country/region where you performed military service."
                    >ℹ️</span
                  ></label
                >
                <select
                name="country-drop"
                  id="country-drop"
                  class="w-full border rounded px-3 py-2"
                  required
                >
                  <option value="">Select One</option>
                </select>
                <button
                  type="button"
                  class="remove-btn mt-2 bg-red-500 text-white px-2 py-1 rounded hidden"
                >
                  Remove
                </button>
              </div>
            </div>

            <button
              type="button"
              id="add-last-travel"
              class="mt-2 hidden bg-blue-500 text-white px-3 py-1 rounded"
            >
              + Add Another
            </button>
            <div id="social-organization-details" class="mb-4 mt-2">
              <label class="block font-semibold mb-2">
                Q:Have you belonged to, contributed to, or worked for any
                professional, social, or charitable organization?
              </label>
              <div class="flex space-x-4">
                <label>
                  <input
                    type="radio"
                    name="social-organization"
                    value="yes"
                    id="social-organization-yes"
                  />
                  Yes
                </label>
                <label>
                  <input
                    type="radio"
                    name="social-organization"
                    value="no"
                    id="social-organization-no"
                  />
                  No
                </label>
              </div>
            </div>

            <div id="social-organization-container">
              <div class="Organization-block mb-2 bg-[#f0f4f8] p-2 rounded-sm">
                <label for="organization-involve" class="font-semibold block mb-1"
                  >Organization Name</label
                >
                <input
                name="organization-involve"
                  type="text"
                  class="w-full border rounded px-3 py-2 state-input"
                  required
                />
                <button
                  type="button"
                  class="remove-btn mt-2 bg-red-500 text-white px-2 py-1 rounded hidden"
                >
                  Remove
                </button>
              </div>
            </div>

            <button
              type="button"
              id="add-social-organization"
              class="mt-2 bg-blue-500 text-white px-3 py-1 hidden rounded"
            >
              + Add Another
            </button>

            <div class="mb-4">
              <label class="block font-semibold mb-1">
                Have you ever been a member of the Taliban?
              </label>
              <div class="flex space-x-6">
                <label class="flex items-center gap-2">
                  <input
                    id="taliban-yes"
                    type="radio"
                    name="taliban-member"
                    value="yes"
                  />
                  Yes
                </label>
                <label class="flex items-center gap-2">
                  <input
                    id="taliban-no"
                    type="radio"
                    name="taliban-member"
                    value="no"
                  />
                  No
                </label>
              </div>
            </div>
            <div
              id="taliban-details"
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
                Do you have any specialized skills or training, such as
                firearms, explosives, nuclear, biological, or chemical
                experience?
              </label>
              <div class="flex space-x-6">
                <label class="flex items-center gap-2">
                  <input
                    id="nuclear-yes"
                    type="radio"
                    name="nuclear-member"
                    value="yes"
                  />
                  Yes
                </label>
                <label class="flex items-center gap-2">
                  <input
                    id="nuclear-no"
                    type="radio"
                    name="nuclear-member"
                    value="no"
                  />
                  No
                </label>
              </div>
            </div>
            <div
              id="nuclear-details"
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
                Have you ever served in the military?
              </label>
              <div class="flex space-x-6">
                <label class="flex items-center gap-2">
                  <input
                    id="military-yes"
                    type="radio"
                    name="military-member"
                    value="yes"
                  />
                  Yes
                </label>
                <label class="flex items-center gap-2">
                  <input
                    id="military-no"
                    type="radio"
                    name="military-member"
                    value="no"
                  />
                  No
                </label>
              </div>
            </div>

            <div id="military-container" class="hidden mt-2">
              <div
                class="military-block mb-4 p-4 border border-gray-400 rounded-lg bg-gray-50 shadow-sm"
              >
                <h3 class="font-semibold text-lg mb-2">
                  Provide the following information:
                </h3>

                <div class="mb-2">
                  <label class="font-semibold block mb-1"
                    >Branch of Service</label
                  >
                  <input
                    type="text"
                    class="w-full border rounded px-3 py-2"
                    required
                  />
                </div>

                <div class="mb-2">
                  <label class="font-semibold block mb-1">Rank/Position</label>
                  <input
                    type="text"
                    class="w-full border rounded px-3 py-2"
                    required
                  />
                </div>

                <div class="mb-2">
                  <label class="font-semibold block mb-1"
                    >Military Specialty</label
                  >
                  <input
                    type="text"
                    class="w-full border rounded px-3 py-2"
                    required
                  />
                </div>

                <div class="mb-2">
                  <label class="font-semibold block mb-1"
                    >Date of Service From</label
                  >
                  <input
                    type="date"
                    class="w-full border rounded px-3 py-2"
                    required
                  />
                </div>

                <div class="mb-2">
                  <label class="font-semibold block mb-1"
                    >Date of Service To</label
                  >
                  <input
                    type="date"
                    class="w-full border rounded px-3 py-2"
                    required
                  />
                </div>

                <button
                  type="button"
                  class="remove-btn mt-2 bg-red-500 text-white px-2 py-1 rounded hidden"
                >
                  Remove
                </button>
              </div>
            </div>

            <button
              type="button"
              id="add-military"
              class="mt-2 bg-blue-500 text-white px-3 py-1 rounded hidden"
            >
              + Add Another
            </button>

            <div class="mb-4">
              <label class="block font-semibold mb-1">
                Have you ever served in, been a member of, or been involved with
                a paramilitary unit, vigilante unit, rebel group, guerrilla
                group, or insurgent organization?
              </label>
              <div class="flex space-x-6">
                <label class="flex items-center gap-2">
                  <input
                    id="guerrilla-yes"
                    type="radio"
                    name="guerrilla-member"
                    value="yes"
                  />
                  Yes
                </label>
                <label class="flex items-center gap-2">
                  <input
                    id="guerrilla-no"
                    type="radio"
                    name="guerrilla-member"
                    value="no"
                  />
                  No
                </label>
              </div>
            </div>
            <div
              id="guerrilla-details"
              class="mt-4 hidden border border-gray-300 p-4 rounded-md bg-gray-50"
            >
              <label class="block font-semibold mb-1">Explain:</label>
              <textarea
                rows="4"
                class="w-full border border-gray-300 rounded px-3 py-2"
                placeholder="Provide explanation here..."
              ></textarea>
            </div>
          