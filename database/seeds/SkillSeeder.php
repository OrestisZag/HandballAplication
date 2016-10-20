<?php

use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * perifereiakoi ids => 4,5,7
     * goalkeeper id => 1
     * extred id => 2,3
     * pivot id => 6
     * @return void
     */
    public function run()
    {
        $periferiakoi = [4, 5, 7];

        foreach ($periferiakoi as $val) {
            //ΤΕΧΝΙΚΗ ΕΠΙΘΕΣΗΣ start
            $skillgroup = 'ΤΕΧΝΙΚΗ ΕΠΙΘΕΣΗΣ';

            DB::table('positions')->insert([
                'title' => 'μακρινή πάσα (ικανότητα)',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'υποδοχή-λαβή μπάλας σε δύσκολες πάσες',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'μακρινή ρίψη (εκτός 9μ.)',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'ρίψη με 0-1 βήμα',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'χαμηλή ρίψη',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'πάσα πίβοτ (ικανότητα)',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'πάσα εξτρέμ (ικανότητα)',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'προσποιήσεις με συνδυασμό ρίψης, πάσας, περάσματος (ποικιλία)',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'προσποιήσεις με τη μπάλα (ποικιλία)',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);
            //ΤΕΧΝΙΚΗ ΕΠΙΘΕΣΗΣ end

            //ΑΤΟΜΙΚΗ ΤΑΚΤΙΚΗ ΕΠΙΘΕΣΗΣ start
            $skillgroup = 'ΑΤΟΜΙΚΗ ΤΑΚΤΙΚΗ ΕΠΙΘΕΣΗΣ';

            DB::table('positions')->insert([
                'title' => 'κίνηση ΠΡΙΝ την υποδοχή μπάλας',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'σωστή επιλογή ενέργειας (πάσα ή σουτ)',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'επιλογή της κατάλληλης ρίψης ως προς τον αμυντικό',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'αποφυγή φάουλ με τη μπάλα',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'κίνηση στον κενό χώρο (ανοικτές άμυνες)',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'πέρασμα 2ο πίβοτ (ικανότητα)',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'Ικανότητα επικοινωνίας του περιφερειακού (playmaker) με τον Προπονητή',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            //ΑΤΟΜΙΚΗ ΤΑΚΤΙΚΗ ΕΠΙΘΕΣΗΣ end

            //ΑΤΟΜΙΚΗ ΤΑΚΤΙΚΗ ΑΙΦΝΙΔΙΑΣΜΟΥ start
            $skillgroup = 'ΑΤΟΜΙΚΗ ΤΑΚΤΙΚΗ ΑΙΦΝΙΔΙΑΣΜΟΥ';

            DB::table('positions')->insert([
                'title' => 'σωστή τοποθέτηση στο 2ο κύμα αιφνιδ.',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'ρίψη από μακρυά (εκτός 9μ.) στον αιφνιδιασμό',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'εκκίνηση αιφνιδιασμού από την ίδια πλευρά με την πλευρά επίθεσης του αντιπάλου',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'παιχνίδι στον αιφνιδιασμό με ψηλά το κεφάλι',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'ικανότητα ευνοϊκής πάσας αιφνιδιασμού',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'αλλαγή πλευράς ανάπτυξης αιφνιδιασμού',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'ξεμαρκάρισμα (όχι στη "σκιά" του αντιπάλου)',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'επιστροφές',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);
            //ΑΤΟΜΙΚΗ ΤΑΚΤΙΚΗ ΑΙΦΝΙΔΙΑΣΜΟΥ end

            //ΤΕΧΝΙΚΗ ΑΜΥΝΑΣ start
            $skillgroup = 'ΤΕΧΝΙΚΗ ΑΜΥΝΑΣ';

            DB::table('positions')->insert([
                'title' => 'φάουλ (ικανότητα)',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'μπλοκ στο σουτ',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'έξοδος-επιστροφή δυνατή-αδύνατη πλευρά',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'σωστό μαρκάρισμα του πίβοτ',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'αποφυγή σκριν',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);
            //ΤΕΧΝΙΚΗ ΑΜΥΝΑΣ end

            //ΑΤΟΜΙΚΗ ΤΑΚΤΙΚΗ ΑΜΥΝΑΣ start
            $skillgroup = 'ΑΤΟΜΙΚΗ ΤΑΚΤΙΚΗ ΑΜΥΝΑΣ';

            DB::table('positions')->insert([
                'title' => 'κλέψιμο στην ντρίμπλα και στην πάσα',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'πρόβλεψη στην πάσα & έξοδο με φάουλ',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'κάλυψη στον κενό χώρο σε έξοδο συμπαίκτη',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'βοήθεια (κάλυψη) συμπαίκτη που περνιέται',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'μαρκάρισμα δίνοντας πλευρά',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'διάθεση για πλάγια μετακίνηση στη μπάλα',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'πίεση του ακραίου αμ. στον αντίπαλο ίντερ',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'επιθετικό φάουλ (ικανότητα)',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => '1 με 1',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);
            //ΑΤΟΜΙΚΗ ΤΑΚΤΙΚΗ ΑΜΥΝΑΣ end

            //ΚΟΙΝΩΝΙΚΑ ΣΤΟΙΧΕΙΑ start
            $skillgroup = 'ΚΟΙΝΩΝΙΚΑ ΣΤΟΙΧΕΙΑ';

            DB::table('positions')->insert([
                'title' => 'Ακρίβεια στην προσελ. προπόνησης',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'Σννεργασία με τους συμπαίκτες του',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'Διάθεση για την προπόνηση',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'Αυτοπεποίθηση',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'Τολμηρός',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'Διαχείριση του άγχους',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'Σννεργασία με τους προπονητές του',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'Διάθεση για την εξέλιξή του',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'Αυτοσυγκέντρωση',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'Ηγέτης',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);
            //ΚΟΙΝΩΝΙΚΑ ΣΤΟΙΧΕΙΑ end
        }

        $extream = [2, 3];

        foreach ($extream as $val) {
            //ΤΕΧΝΙΚΗ ΕΠΙΘΕΣΗΣ start
            $skillgroup = 'ΤΕΧΝΙΚΗ ΕΠΙΘΕΣΗΣ';

            DB::table('positions')->insert([
                'title' => 'υποδοχή-λαβή πάσας (ικανότητα)',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'υποδοχή μπάλας στο 3ο (τελευταίο) βήμα',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'ρίψεις (ποικιλία)',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'προσποιήσεις στη ρίψη',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'ρίψη λίγο πριν την πτώση (ικανότητα)',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'άλμα με αριστερό και δεξί πόδι (ικανότητα)',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'διάφορες προσποιήσεις (ποικιλία)',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'ρίψη αιφνιδιασμού',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'ρίψη από θέση πίβοτ',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'ρίψη από 9μ.',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            //ΤΕΧΝΙΚΗ ΕΠΙΘΕΣΗΣ end

            //ΑΤΟΜΙΚΗ ΤΕΧΝΙΚΗ ΕΠΙΘΕΣΗΣ start
            $skillgroup = 'ΑΤΟΜΙΚΗ ΤΕΧΝΙΚΗ ΕΠΙΘΕΣΗΣ';

            DB::table('positions')->insert([
                'title' => 'κίνηση ΠΡΙΝ την υποδοχή μπάλας',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'σωστή επιλογή ενέργειας (πάσα ή σουτ)',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'κόψιμο 2ο πίβοτ (πρωτοβουλία)',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);
            //ΑΤΟΜΙΚΗ ΤΕΧΝΙΚΗ ΕΠΙΘΕΣΗΣ end

            //ΑΤΟΜΙΚΗ ΤΑΚΤΙΚΗ ΑΙΦΝΙΔΙΑΣΜΟΥ start
            $skillgroup = 'ΑΤΟΜΙΚΗ ΤΑΚΤΙΚΗ ΑΙΦΝΙΔΙΑΣΜΟΥ';

            DB::table('positions')->insert([
                'title' => 'εκκίνηση αιφνιδιασμού από την ίδια πλευρά με την πλευρά επίθεσης του αντιπάλου',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'χωρίς ντρίμπλα',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'παιχνίδι στον αιφνιδιασμό με ψηλά το κεφάλι',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'ικανότητα ευνοϊκής πάσας αιφνιδιασμού',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'αλλαγή πλευράς ανάπτυξης αιφνιδιασμού',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'ξεμαρκάρισμα (όχι στη "σκιά" του αντιπάλου)',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'επιστροφές',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            //ΑΤΟΜΙΚΗ ΤΑΚΤΙΚΗ ΑΙΦΝΙΔΙΑΣΜΟΥ end

            //ΤΕΧΝΙΚΗ ΑΜΥΝΑΣ start
            $skillgroup = 'ΤΕΧΝΙΚΗ ΑΜΥΝΑΣ';

            DB::table('positions')->insert([
                'title' => 'φάουλ (ικανότητα)',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'κλέψιμο (ικανότητα)',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'μπλοκ στο σουτ ',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'έξοδος-κάλυψη (επιδεξιότητα)',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'προωθημένη άμυνα (ικανότητα)',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'σωστό μαρκάρισμα του πίβοτ (τεχνική)',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'αποφυγή σκριν',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            //ΤΕΧΝΙΚΗ ΑΜΥΝΑΣ end

            //ΑΤΟΜΙΚΗ ΤΑΚΤΙΚΗ ΑΜΥΝΑΣ start
            $skillgroup = 'ΑΤΟΜΙΚΗ ΤΑΚΤΙΚΗ ΑΜΥΝΑΣ';

            DB::table('positions')->insert([
                'title' => 'κλέψιμο στην ντρίμπλα',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'πρόβλεψη στην πάσα & έξοδο με φάουλ',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'κάλυψη στον κενό χώρο σε έξοδο συμπαίκτη',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'βοήθεια (κάλυψη) συμπαίκτη που περνιέται',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'μαρκάρισμα δίνοντας πλευρά',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'διάθεση για πλάγια μετακίνηση στη μπάλα',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'επιθετικό φάουλ (ικανότητα)',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            //ΑΤΟΜΙΚΗ ΤΑΚΤΙΚΗ ΑΜΥΝΑΣ end

            //ΚΟΙΝΩΝΙΚΑ ΣΤΟΙΧΕΙΑ start
            $skillgroup = 'ΚΟΙΝΩΝΙΚΑ ΣΤΟΙΧΕΙΑ';

            DB::table('positions')->insert([
                'title' => 'Ακρίβεια στην προσελ. προπόνησης',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'Σννεργασία με τους συμπαίκτες του',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'Διάθεση για την προπόνηση',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'Αυτοπεποίθηση',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'Τολμηρός',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'Διαχείριση του άγχους',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'Σννεργασία με τους προπονητές του',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'Διάθεση για την εξέλιξή του',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'Αυτοσυγκέντρωση',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);

            DB::table('positions')->insert([
                'title' => 'Ηγέτης',
                'SkillGroup' => $skillgroup,
                'position_id' => $val
            ]);
            //ΚΟΙΝΩΝΙΚΑ ΣΤΟΙΧΕΙΑ end
        }

        $pivot = 6;

        $val = $pivot; //just rename the variable. so the same code will be usefull

        //ΤΕΧΝΙΚΗ ΕΠΙΘΕΣΗΣ start
        $skillgroup = 'ΤΕΧΝΙΚΗ ΕΠΙΘΕΣΗΣ';

        DB::table('positions')->insert([
            'title' => 'τοποθετήσεις χωρίς μπάλα (ποικιλία & σωστή τεχνική)',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'υποδοχή-λαβή μπάλας σε δύσκολες πάσες',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'κινήσεις με μπάλα (πιβοτάρισμα)',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'ρίψη ',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'πάσα (ικανότητα, όταν είναι στην περιφέρεια)',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        //ΤΕΧΝΙΚΗ ΕΠΙΘΕΣΗΣ end

        //ΑΤΟΜΙΚΗ ΤΑΚΤΙΚΗ ΕΠΙΘΕΣΗΣ start
        $skillgroup = 'ΑΤΟΜΙΚΗ ΤΕΧΝΙΚΗ ΕΠΙΘΕΣΗΣ';

        DB::table('positions')->insert([
            'title' => 'κινήσεις χωρίς μπάλα (ως τακτική σκέψη)',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'βοήθεια στην κυκλοφορία της μπάλας (με και χωρίς μπάλα)',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'δημιουργία υπεραριθμίας με προσποίηση στη γραμμή των 6μ.',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'αντίθετες κινήσεις από τις απειλές των περιφερειακών',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        //ΑΤΟΜΙΚΗ ΤΕΧΝΙΚΗ ΕΠΙΘΕΣΗΣ end

        //ΑΤΟΜΙΚΗ ΤΑΚΤΙΚΗ ΑΙΦΝΙΔΙΑΣΜΟΥ start
        $skillgroup = 'ΑΤΟΜΙΚΗ ΤΕΧΝΙΚΗ ΕΠΙΘΕΣΗΣ';

        DB::table('positions')->insert([
            'title' => 'εκκίνηση αιφνιδιασμού από την ίδια πλευρά με την πλευρά επίθεσης του αντιπάλου',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'χωρίς ντρίμπλα',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'παιχνίδι στον αιφνιδιασμό με ψηλά το κεφάλι',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'ικανότητα ευνοϊκής πάσας αιφνιδιασμού',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'αλλαγή πλευράς ανάπτυξης αιφνιδιασμού',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'ξεμαρκάρισμα (όχι στη "σκιά" του αντιπάλου)',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'επιστροφές',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        //ΑΤΟΜΙΚΗ ΤΑΚΤΙΚΗ ΑΙΦΝΙΔΙΑΣΜΟΥ end

        //ΤΕΧΝΙΚΗ ΑΜΥΝΑΣ start
        $skillgroup = 'ΤΕΧΝΙΚΗ ΑΜΥΝΑΣ';

        DB::table('positions')->insert([
            'title' => 'φάουλ (ικανότητα)',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'κλέψιμο (ικανότητα)',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'μπλοκ στο σουτ ',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'έξοδος-κάλυψη (επιδεξιότητα)',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'προωθημένη άμυνα (ικανότητα)',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'σωστό μαρκάρισμα του πίβοτ (τεχνική)',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'αποφυγή σκριν',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        //ΤΕΧΝΙΚΗ ΑΜΥΝΑΣ end

        //ΑΤΟΜΙΚΗ ΤΑΚΤΙΚΗ ΑΜΥΝΑΣ start
        $skillgroup = 'ΑΤΟΜΙΚΗ ΤΑΚΤΙΚΗ ΑΜΥΝΑΣ';

        DB::table('positions')->insert([
            'title' => 'κλέψιμο στην ντρίμπλα',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'πρόβλεψη στην πάσα & έξοδο με φάουλ',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'κάλυψη στον κενό χώρο σε έξοδο συμπαίκτη',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'βοήθεια (κάλυψη) συμπαίκτη που περνιέται',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'μαρκάρισμα δίνοντας πλευρά',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'διάθεση για πλάγια μετακίνηση στη μπάλα',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'επιθετικό φάουλ (ικανότητα)',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        //ΑΤΟΜΙΚΗ ΤΑΚΤΙΚΗ ΑΜΥΝΑΣ end

        //ΚΟΙΝΩΝΙΚΑ ΣΤΟΙΧΕΙΑ start
        $skillgroup = 'ΚΟΙΝΩΝΙΚΑ ΣΤΟΙΧΕΙΑ';

        DB::table('positions')->insert([
            'title' => 'Ακρίβεια στην προσελ. προπόνησης',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'Σννεργασία με τους συμπαίκτες του',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'Διάθεση για την προπόνηση',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'Αυτοπεποίθηση',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'Τολμηρός',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'Διαχείριση του άγχους',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'Σννεργασία με τους προπονητές του',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'Διάθεση για την εξέλιξή του',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'Αυτοσυγκέντρωση',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'Ηγέτης',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);
        //ΚΟΙΝΩΝΙΚΑ ΣΤΟΙΧΕΙΑ end

        $goalkeeper = 1;

        $val = $goalkeeper; //just rename the variable. so the same code will be usefull

        //ΤΕΧΝΙΚΗ start
        $skillgroup = 'ΤΕΧΝΙΚΗ';

        DB::table('positions')->insert([
            'title' => 'από εξτρέμ',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'από πίβοτ',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'από 6μ.',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'από περιφέρεια - ψηλά σουτ',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'από περιφέρεια - μεσαία σουτ',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'από περιφέρεια - χαμηλά σουτ',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'μακρινή πάσα αιφνιδιασμού',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        //ΤΕΧΝΙΚΗ end

        //ΑΠΟΤΕΛΕΣΜΑΤΙΚΟΤΗΤΑ start
        $skillgroup = 'ΑΠΟΤΕΛΕΣΜΑΤΙΚΟΤΗΤΑ';

        DB::table('positions')->insert([
            'title' => 'από εξτρέμ',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'από πίβοτ',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'από 6μ.',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'από περιφέρεια (έξω από 9μ.)',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'από πέναλτυ',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);
        //ΑΠΟΤΕΛΕΣΜΑΤΙΚΟΤΗΤΑ end

        //ΤΑΚΤΙΚΗ start
        $skillgroup = 'ΤΑΚΤΙΚΗ';

        DB::table('positions')->insert([
            'title' => 'από εξτρέμ',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'από πίβοτ',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'από περιφέρεια (συνεργασία με μπλοκ)',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'τοποθετήσεις στην εστία',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'αίσθηση του χώρου',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);
        //ΤΑΚΤΙΚΗ end

        //ΚΟΙΝΩΝΙΚΑ ΣΤΟΙΧΕΙΑ start
        $skillgroup = 'ΚΟΙΝΩΝΙΚΑ ΣΤΟΙΧΕΙΑ';

        DB::table('positions')->insert([
            'title' => 'Ακρίβεια στην προσελ. προπόνησης',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'Σννεργασία με τους συμπαίκτες του',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'Διάθεση για την προπόνηση',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'Αυτοπεποίθηση',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'Τολμηρός',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'Διαχείριση του άγχους',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'Σννεργασία με τους προπονητές του',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'Διάθεση για την εξέλιξή του',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'Αυτοσυγκέντρωση',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);

        DB::table('positions')->insert([
            'title' => 'Ηγέτης',
            'SkillGroup' => $skillgroup,
            'position_id' => $val
        ]);
        //ΚΟΙΝΩΝΙΚΑ ΣΤΟΙΧΕΙΑ end
    }

}
