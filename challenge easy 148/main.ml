open Str;;

let position = ref 0;;
let rotations = ref 0;;

let rec spin target digits direction =
    if !position != target then
    begin
        rotations := !rotations + 1;
        position := (!position + direction + digits) mod digits;
        spin target digits direction;
    end
;;

let input = Str.split (regexp " ") (read_line ()) in
    let digits = int_of_string (List.nth input 0) in
    rotations := digits * 2;

    (* First spin - clockwise *)
    spin (int_of_string (List.nth input 1)) digits 1;

    (* Second spin - full rotation *)
    rotations := !rotations + digits;

    (* Third spin - counterclockwise *)
    let num2 = int_of_string (List.nth input 2) in
    let num3 = int_of_string (List.nth input 3) in
    spin num2 digits (-1);

    (* Fourth spin - clockwise *)
    if num2 == num3 then
        rotations := !rotations + digits
    else
        spin num3 digits 1
    ;;

    print_endline (string_of_int !rotations);
;;