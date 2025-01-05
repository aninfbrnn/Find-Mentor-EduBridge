<div class="py-6 overflow-visible">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-visible shadow-sm sm:rounded-lg">
          <div class="flex flex-col md:flex-row h-[84vh]">
              <!-- Chat List -->
              <div class="relative w-full md:w-[320px] xl:w-[400px] overflow-y-auto shrink-0 border" >
                  <livewire:chat.chat-list :selectedConversation="$selectedConversation" :query="$query">
              </div>
              
              <!-- Chat Content Placeholder -->
              <div class="col-md-8">
                  <!-- Placeholder for chat content -->
                  <livewire:chat.chat-box :selectedConversation="$selectedConversation">
              </div>
          </div>
      </div>
  </div>
</div>
