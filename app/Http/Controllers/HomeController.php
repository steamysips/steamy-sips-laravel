<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    private function validateURL(): bool
    {
        return request()->path() === '/';
    }

    private function handleInvalidURL(): void
    {
        if (!$this->validateURL()) {
            abort(404);
        }
    }

    public function index()
    {
        $this->handleInvalidURL();
        return view('home', [
            'template_title' => 'Home',
            'template_tags' => $this->getLibrariesTags(['aos', 'splide']),
            'template_meta_description' => "Welcome to Steamy Sips Café, where every sip is an experience. Step into our cozy world of aromatic delights, where the perfect brew meets community and conversation."
        ]);
    }

    /**
     * Returns the required HTML code to load JS libraries.
     * @param string[] $required_libraries An array of strings representing the names of the libraries that must be
     * @return string HTML tags to load the library.
     */
    private function getLibrariesTags(array $required_libraries): string
    {
        $library_tags = [];

        $library_tags['aos'] = <<< EOL
        <!-- AOS animation library-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css"
          integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"
            integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        EOL;

        // concatenate all tags for the required libraries
        $script_str = "";
        foreach (array_keys($library_tags) as $library) {
            if (in_array($library, $required_libraries, true)) {
                $script_str .= $library_tags[$library];
            }
        }
        return $script_str;
    }
}
