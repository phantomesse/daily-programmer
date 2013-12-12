findstr = input('What do you want to find? (Force, Mass, or Acceleration)\n', 's');
find = lower(findstr(1));

switch find
    case 'f'
        mass = input('Mass = ');
        acc = input('Acceleration = ');
        disp(['Force = ', num2str(mass*acc)]);
    case 'm'
        force = input('Force = ');
        acc = input('Acceleration = ');
        disp(['Mass = ', num2str(force/acc)]);
	case 'a'
        force = input('Force = ');
        mass = input('Mass = ');
        disp(['Acceleration = ', num2str(force/mass)]);
end