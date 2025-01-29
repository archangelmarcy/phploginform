<?php
class User
{
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $email;
    private ?string $birthDate;
    private ?string $profilePicture;

    public function __construct(string $email, string $password)
    {
        // Otwieramy połączenie do bazy danych
        $db = new mysqli("localhost", "root", "", "phploginform");

        // Przygotowujemy zapytanie
        $sql = "SELECT * FROM user WHERE email='$email' LIMIT 1";

        // Wysyłamy zapytanie do bazy
        $result = $db->query($sql);

        if ($result->num_rows == 1) {
            // Znaleźliśmy jednego użytkownika
            // Wyciągamy dane z tego użytkownika
            $row = $result->fetch_assoc();

            // Sprawdzamy, czy hasło podane w formularzu pasuje do hasła z bazy
            if (password_verify($password, $row['password'])) {
                // Zapisujemy dane z bazy do lokalnych zmiennych obiektu
                $this->id = $row['id'];
                $this->email = $row['email'];
                $this->firstName = $row['firstname'];
                $this->lastName = $row['lastname'];
                $this->birthDate = $row['birthdate'] ?? null;
                $this->profilePicture = $row['profilepicture'] ?? null;
                $db->close();
            } else {
                // Niepoprawne hasło
                die("Błąd konstruktora - niepoprawne hasło");
            }
        } else {
            // Nie ma takiego użytkownika
            die("Błąd konstruktora - nie ma takiego użytkownika");
        }
    }

    public function login() {
        // Metoda login() jest teraz zintegrowana z konstruktorem
        return isset($this->id);
    }

    public function registerSession() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['user'] = $this;
    }

    public function getEmail() : string {
        return $this->email;
    }

    public function getFirstName() : string {
        return $this->firstName;
    }

    public function getLastName() : string {
        return $this->lastName;
    }

    public function getBirthDate() : ?string {
        return $this->birthDate;
    }

    public function getProfilePicture() : ?string {
        return $this->profilePicture;
    }

    public static function register(string $email, string $password, string $firstName = "", string $lastName = "", string $birthDate = "", string $profilePicture = "") {
        // Otwieramy połączenie do bazy danych
        $db = new mysqli("localhost", "root", "", "phploginform");

        // Zaszyfruj hasło używając argon2i
        $password = password_hash($password, PASSWORD_ARGON2I);

        // Przygotuj kwerendę
        $sql = "INSERT INTO user (email, password, firstname, lastname, birthdate, profilepicture) 
                VALUES ('$email','$password','$firstName','$lastName','$birthDate','$profilePicture')";

        // Wyślij kwerendę do bazy
        $db->query($sql);
    }
}
?>