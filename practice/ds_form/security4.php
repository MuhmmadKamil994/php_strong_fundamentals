
            <h1 class="font-semibold text-lg mb-4">
              Security and Backgroud information:part4
            </h1>

            <div
              class="border border-gray-400 bg-gray-50 p-4 rounded-md text-sm text-gray-700 mb-6"
            >
              <strong>NOTE:</strong>Provide the following security and
              background information. Provide complete and accurate information
              to all questions that require an explanation. A visa may not be
              issued to persons who are within specific categories defined by
              law as inadmissible to the United States (except when a waiver is
              obtained in advance). Are any of the following applicable to you?
              While a YES answer does not automatically signify ineligibility
              for a visa, if you answer YES you may be required to personally
              appear before a consular officer.
            </div>
            <div class="mb-4">
              <label class="block font-semibold mb-1">
                Have you ever sought to obtain or assist others to obtain a
                visa, entry into the United States, or any other United States
                immigration benefit by fraud or willful misrepresentation or
                other unlawful means?
              </label>
              <div class="flex space-x-6">
                <label class="flex items-center gap-2">
                  <input
                    id="fraud-visa-yes"
                    type="radio"
                    name="fraud-visa"
                    value="yes"
                  />
                  Yes
                </label>
                <label class="flex items-center gap-2">
                  <input
                    id="fraud-visa"
                    type="radio"
                    name="fraud-visa"
                    value="no"
                  />
                  No
                </label>
              </div>
            </div>
            <div
              id="fraud-visa-details"
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
                Have you ever been removed or deported from any country?
              </label>
              <div class="flex space-x-6">
                <label class="flex items-center gap-2">
                  <input
                    id="deportion-yes"
                    type="radio"
                    name="deportion"
                    value="yes"
                  />
                  Yes
                </label>
                <label class="flex items-center gap-2">
                  <input
                    id="deportion-no"
                    type="radio"
                    name="deportion"
                    value="no"
                  />
                  No
                </label>
              </div>
            </div>
            <div
              id="deportion-details"
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