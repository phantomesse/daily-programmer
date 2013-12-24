function polygonperimeter = polygonperimeter(n, r)

a = pi/str2double(n);
s = str2double(r) .* sin(a);
perimeter = 2 .* s .* str2double(n);
disp([perimeter]);