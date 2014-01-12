open Str

let roll die =
    let nm = Str.split (regexp "d") die in
        let times = int_of_string (List.nth nm 0) in
        let faces = int_of_string (List.nth nm 1) in
            for i = 1 to times do
                let roll = Random.int faces in
                    print_string (string_of_int (roll + 1));
                    print_string " "
            done
;;

let die = read_line () in
    roll die;
;;
print_endline "";