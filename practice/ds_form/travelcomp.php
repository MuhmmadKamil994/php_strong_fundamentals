
            <h2 class="font-semibold text-lg mb-4">
              Travel Company Information
            </h2>
            <div
              class="border border-gray-400 bg-gray-50 p-4 rounded-md text-sm text-gray-700 mb-6"
            >
              <strong>NOTE:</strong> Provide the following information
              concerning your travel plans.
            </div>
            <h2 class="font-semibold text-lg mb-4">
              Persons traveling with you<span
                class="text-blue-600 cursor-pointer"
                data-bs-toggle="tooltip"
                title="You should answer Yes to this question if you are traveling with family, as part of an organized tour, or as part of a performing group or athletic team. You do not need to list individuals who are traveling with you for the purposes of employment with the same employer.."
                >ℹ️</span
              >
            </h2>
            <div class="mb-4">
              <label class="block font-semibold mb-1">
                Q: Are there other persons traveling with you?
              </label>
              <div class="flex space-x-6">
                <label class="flex items-center gap-2">
                  <input type="radio" name="traveling" value="yes"  data-original-required/>
                  Yes
                </label>
                <label class="flex items-center gap-2">
                  <input type="radio" name="traveling" value="no" data-original-required="" />
                  No
                </label>
              </div>
          

            <div id="group-travel-section" class="hidden mb-4">
              <label class="block font-semibold mb-1">
                Q:Are you traveling as part of a group or organization?
              </label>
              <div class="flex space-x-6">
                <label class="flex items-center gap-2">
                  <input type="radio" name="group-travel" value="yes"  data-original-required/>
                  Yes
                </label>
                <label class="flex items-center gap-2">
                  <input type="radio" name="group-travel" value="no" data-original-required />
                  No
                </label>
              </div>
            </div>
            <div id="group-name-section" class="hidden mb-4">
              <h2 class="font-semibold text-lg mb-4">
                Enter the Name of the Group You Are Traveling With
              </h2>
              <label class="block font-semibold mb-1">Group Name</label>
              <input type="text" class="w-full border rounded px-3 py-2" required/>
            </div>

            <!-- Individual Person Traveling Inputs (Hidden by default) -->
            <div id="individual-travelers-section" class="hidden">
              <div class="mb-4">
                <label for="traveling-person" class="block font-semibold mb-1"
                  >Surnames of Person Traveling With You</label
                >
                <input  name="traveling-person" type="text" class="w-full border rounded px-3 py-2" required/>
              </div>

              <div class="mb-4">
                <label for="travel-gname" class="block font-semibold mb-1"
                  >Given Names of Person Traveling With You</label
                >
                <input name="travel-gname" type="text" class="w-full border rounded px-3 py-2" required/>
              </div>

              <div class="mb-4">
                <label
                  for="us-contact-relationship"
                  class="block font-semibold mb-1"
                  >Relationship to You (U.S. Point of Contact)</label
                >
                <select
                  id="us-contact-relationship"
                  name="us-contact-relationship"
                  class="w-full border rounded px-3 py-2"
                >
                  <option value="">--Select Relationship--</option>
                  <option value="Relative">Relative</option>
                  <option value="Spouse">Spouse</option>
                  <option value="Friend">Friend</option>
                  <option value="Business Associate">Business Associate</option>
                  <option value="Employer">Child</option>
                  <option value="Other">Other</option>
                </select>
              </div>
            </div>
          </div>